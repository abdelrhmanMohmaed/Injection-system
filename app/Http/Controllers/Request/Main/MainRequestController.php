<?php

namespace App\Http\Controllers\Request\Main;

use App\Helper\MainActionType;
use App\Helper\MainStatus;
use App\Helper\QualityStatus;
use App\Helper\RequestPriority;
use App\Helper\RequestType;
use App\Notifications\MainRequest;
use App\Notifications\ToolRequest;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class MainRequestController extends Controller
{
    public function index()
    {
        return view('Area.Requests.Maintenance.MainRequest');
    }

    public function store(Request $request)
    {
        $data = $request->except('issue');
        $part = PublicRepository::findById('PartNumber', $request->part_id);
        $data['machine_id'] = $part->machine_id;
        $req = PublicRepository::save('MainRequest', $data);
        $req = PublicRepository::findById('MainRequest', $req->id, ['part', 'user', 'machine','sub_issue','issue']);
        $notifiy = [
            'user' => $req->user,
            'title' => 'New Maintenance Request',
            'message' => 'New Maintenance Request Opened By ' . $req->user->name . ' With Issue ' . $req->issue->name,
            'request_id' => $req->id,
            'type' => 'New Maintenance Request',
        ];
        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new MainRequest($notifiy));
        }
        $res = json_encode($req);
        return $res;
    }

    public function getRequest()
    {
        $req=\App\Models\MainRequest::with(['part', 'user','issue','sub_issue', 'machine'])
            ->whereIn('status',[MainStatus::Open,MainStatus::ToolDownloaded,MainStatus::RejectFromProduction])
            ->get();
        $req = json_encode($req);
        return $req;
    }

    public function addMainAction(Request $request)
    {
        $tool='';
        $req = PublicRepository::findById('MainRequest', $request->request_id,['action']);
        $data=$request->except('issue_id','sub_issue_id','tool_issue');
        $now=Carbon::now();
        if(!$req->action){
            $date=Carbon::parse($req->created_at);
            $data['total_time']=$date->diffInMinutes($now);
            $data['time_start']=$req->created_at;
            $data['time_end']=$now;
        }else{
            $date=Carbon::parse($req->action->time_start);
            $diff=$date->diffInMinutes($now);
            $total=$diff + $req->action->total_time;
            $data['total_time']=$total;
            $data['time_end']=$now;
        }
        if($request->type==MainActionType::ToolShopIssue){
            $reqData['status']=MainStatus::ToolShopIssue;
            $toolData=$request->only('user_id','shift');
            $toolData['issue_id']=$request->tool_issue;
            $toolData['part_id']=$req->part_id;
            $toolData['priority']=RequestPriority::Production;
        }elseif($request->type==MainActionType::DownloadTool){
            $reqData['status']=MainStatus::NeedToolDownload;
            $reqData['time_start']=$now;
        }elseif($request->type==MainActionType::ProcessIssue){
            $reqData['status']=MainStatus::ProcessIssue;
            $reqData['time_start']=$now;
        }elseif($request->type==MainActionType::Solved){
            $reqData['status']=MainStatus::ClosedFromMain;
            $reqData['time_start']=$now;
        }
        if($req->action){
            PublicRepository::update('MainAction',$req->action->id,$data);
            $action=$req->action;
        }else{
            $action=PublicRepository::save('MainAction',$data);
        }
        if(isset($reqData)){
            $reqStatus=PublicRepository::update('MainRequest',$req->id,$reqData);
        }
        if($request->issue_id){
            $issueData=$request->only('issue_id','sub_issue_id');
            $issueData['action_id']=$action->id;
            $issue=PublicRepository::save('MainIssue',$issueData);
        }
        $res=PublicRepository::findById('MainRequest',$req->id
            ,['part', 'user', 'machine','sub_issue','issue','action']);

        $notifiy = [
            'user' => $action->user,
            'title' => 'Maintenance Action',
            'message' =>  $action->user->name . ' Take An Action On Request Number ' . $request->request_id,
            'request_id' => $request->request_id,
            'type' => 'Maintenance Request',
        ];
        if(isset($toolData)){
            $toolRequest=PublicRepository::save('ToolRequest',$toolData);
            $tool=PublicRepository::findById('ToolRequest',$toolRequest->id
                ,['part','user','issue','part.machine']);
            $notifiy2=[
                'user'=>$tool->user,
                'title'=>'New Tool Request',
                'message'=>'New Tool Request Opened By '.$tool->user->name.' With Issue '.$tool->issue->name,
                'tool_id'=>$tool->id,
                'type'=>'New Tool Request',
            ];
        }
        foreach (PublicRepository::findAll('User') as $user){
            Notification::send($user,new MainRequest($notifiy));
            if (isset($notifiy2)){
                Notification::send($user,new ToolRequest($notifiy2));
            }
        }
        $return['main']=$res;
        $return['tool']=$tool;
        return json_encode($return);
    }

    public function mainActions()
    {
        $actions=\App\Models\MainRequest::
        with(['action', 'part', 'machine','issue','sub_issue', 'action.user'])
            ->whereIn('status',[MainStatus::ClosedFromMain,MainStatus::ProcessIssue,MainStatus::NeedToolDownload])
            ->get();
        return view('Area.Requests.Maintenance.MainActions', compact('actions'));
    }

    public function confirmDownload($req_id)
    {
        $req=PublicRepository::findById('MainRequest',$req_id,['action']);
        $now=Carbon::now();
        $data['total_time']=$req->total_time + Carbon::parse($req->time_start)->diffInMinutes($now);
        $data['time_end']=$now;
        $data['status']=MainStatus::ToolDownloaded;
        $actionData['time_start']=$now;
        PublicRepository::update('MainRequest',$req_id,$data);
        $req->action->update($actionData);
//        PublicRepository::update('MainAction',$req->action->id,$actionData);
        $res=PublicRepository::findById('MainRequest',$req_id
            ,['part', 'user','machine','sub_issue','issue','action']);
        $notifiy = [
            'user' => $res->user,
            'title' => 'Production Action',
            'message' =>  $res->user->name . ' Take An Action On Request Number ' . $res->id,
            'request_id' => $res->id,
            'type' => 'Production Action',
        ];
        foreach (PublicRepository::findAll('User') as $user){
            Notification::send($user,new MainRequest($notifiy));
        }
        return json_encode($res);
    }

    public function addProductionAction(Request $request)
    {
        $req = PublicRepository::findById('MainRequest', $request->id, ['action']);
        $now=Carbon::now();
        if($request->action=='Reject'){
            $date=Carbon::parse($req->time_start);
            $data['time_end']=$now;
            $diff=$date->diffInMinutes($now);
            $data['total_time']=$req->total_time + $diff;
            $data['status']=MainStatus::RejectFromProduction;
            $data['last_action']=$request->action;
            $actionData['time_start']=$now;
            PublicRepository::update('MainRequest',$req->id,$data);
            $req->action->update($actionData);
//            PublicRepository::update('MainAction',$req->action->id,$actionData);
        }else {
            $date = Carbon::parse($req->time_start);
            $data['time_end'] = $now;
            $diff = $date->diffInMinutes($now);
            $data['total_time'] = $req->total_time + $diff;
            $data['status'] = MainStatus::Closed;
            $data['last_action'] = $request->action;
            PublicRepository::update('MainRequest', $req->id, $data);
        }
        $res = PublicRepository::findById('MainRequest', $request->id,
            ['part', 'user','machine','sub_issue','issue','action']);
        $notifiy = [
            'user' => $res->user,
            'title' => 'Production Action',
            'message' => 'Production Take An Action By (' . $request->action . ') On Maintenance Request Number ' . $res->id,
            'request_id' => $request->id,
            'type' => 'Production Action',
        ];
        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new MainRequest($notifiy));
        }
        return json_encode($res);
    }

    public function allRequests()
    {
        $requests = PublicRepository::findAll('MainRequest',
            ['user', 'part', 'machine','issue','sub_issue','action','action.user','action.issue_action','action.issue_action.issue','action.issue_action.sub_issue']);
        return view('Area.Requests.Maintenance.AllRequests', compact('requests'));
    }
}
