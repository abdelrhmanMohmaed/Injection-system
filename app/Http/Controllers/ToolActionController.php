<?php

namespace App\Http\Controllers;

use App\Helper\ActionType;
use App\Helper\QualityStatus;
use App\Helper\RequestStatus;
use App\Notifications\QualityRequest;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ToolActionController extends Controller
{
    public function index()
    {

    }

    public function create(Request $request)
    {
        $qualityRes=null;
        if($request->type!=ActionType::Transfer){
            $data=$request->except('_token','cav_num','cav');
            $toolRequest=PublicRepository::findById('ToolRequest',$request->request_id,['part','action']);
            $now=Carbon::now();
            if($toolRequest->status== RequestStatus::InToolShop || $toolRequest->status==RequestStatus::RejectFromProduction){
                $date=Carbon::parse($toolRequest->action->tool_start);
                $diff=$date->diffInMinutes($now);
                $total=$diff + $toolRequest->action->total_time;
                $data['total_time']=$total;
                $data['tool_end']=$now;
                if($request->reject_sample==true){
                    $data['reject_sample']=1;
                }else{
                    $data['reject_sample']=0;
                }
                $toolRequest->action->update($data);
                $action=PublicRepository::findById('ToolAction',$toolRequest->action->id);
            }else{
            $date=Carbon::parse($toolRequest->created_at);
            $diff=$date->diffInMinutes($now);
            $data['total_time']=$diff;
            $data['tool_start']=$toolRequest->created_at;
            $data['tool_end']=$now;
                if($request->reject_sample==true){
                    $data['reject_sample']=1;
                }else{
                    $data['reject_sample']=0;
                }
            $action=PublicRepository::save('ToolAction',$data);
                if($action->reject_sample==1){
                    $quaity=$request->only('user_id','shift');
                    $quaity['part_id']=$toolRequest->part_id;
                    $quaity['machine_id']=$toolRequest->part->machine_id;
                    $quaity['issue']='Reject Sample';
                    $quaity['status']=QualityStatus::Open;
                    $qualityReq=PublicRepository::save('QualityRequest',$quaity);
                    $qualityRes=PublicRepository::findById('QualityRequest',$qualityReq->id,['part', 'user', 'machine']);
                    $notifiyX = [
                        'user' => $qualityRes->user,
                        'title' => 'New Quality Request',
                        'message' => 'New Quality Request Opened By ' . $qualityRes->user->name . ' With Issue ' . $qualityRes->issue,
                        'request_id' => $qualityRes->id,
                        'type' => 'New Quality Request',
                    ];
                    foreach (PublicRepository::findAll('User') as $user) {
                        Notification::send($user, new QualityRequest($notifiyX));
                    }
                }
            }
            if($request->cav_num){
                $cavData['cav_num']=$request->cav_num;
                $cavData['cav']=serialize($request->cav);
                $cavData['action_id']=$action->id;
                PublicRepository::save('ClosedCav',$cavData);
            }
            if($request->type==ActionType::NeedToolShop){
                $update['status']=RequestStatus::NeedToolShop;
            }else{
            $update['status']=RequestStatus::CloseFromTool;
            }
            $update['time_start']=$now;
            $toolRequest->update($update);
            $notifiy=[
                'user'=>$action->user,
                'title'=>'Tooling Action',
                'message'=>$action->user->name.' Take An Action On Request Number '.$request->request_id,
                'tool_id'=>$request->request_id,
                'type'=>'New Tooling Action',
            ];
            foreach (PublicRepository::findAll('User') as $user){
                Notification::send($user,new \App\Notifications\ToolRequest($notifiy));
            }
            $res['tool']=PublicRepository::findById('ToolRequest',$toolRequest->id,['part','user','issue','part.machine']);
            $res['quality']=$qualityRes;
            return json_encode($res);
        }

        else{

        }
    }

    public function confirmInTool($id)
    {
        $request=PublicRepository::findById('ToolRequest',$id,['action']);
        $date=Carbon::parse($request->time_start);
        $now=Carbon::now();
        $diff=$date->diffInMinutes($now);
        $data['total_time']=$diff;
        $data['time_end']=$now;
        $data['status']=RequestStatus::InToolShop;
        $request->update($data);
        $actionData['tool_start']=$now;
        $request->action->update($actionData);
        return json_encode(PublicRepository::findById('ToolRequest',$id,['part','user','issue','part.machine']));
    }

    public function toolLastAction($id,$action)
    {
        $request=PublicRepository::findById('ToolRequest',$id,['action','user']);
        $user=$request->user;
        $now=Carbon::now();
        if($action=='reject'){
            $date=Carbon::parse($request->time_start);
            $data['time_end']=$now;
            $diff=$date->diffInMinutes($now);
            $data['total_time']=$request->total_time + $diff;
            $data['status']=RequestStatus::RejectFromProduction;
            $data['last_action']=$action;
            $request->update($data);
            $actionData['tool_start']=$now;
            $request->action->update($actionData);
        }else{
            $date=Carbon::parse($request->time_start);
            $data['time_end']=$now;
            $diff=$date->diffInMinutes($now);
            $data['total_time']=$request->total_time + $diff;
            $data['status']=RequestStatus::Closed;
            $data['last_action']=$action;
            $request->update($data);
        }
        $notifiy=[
            'user'=> $user,
            'title'=>'Production Action',
            'message'=>'Production Take An Action By ('.$action.') On Tool Request Number '.$id,
            'tool_id'=>$id,
            'type'=>'Production Action',
        ];
        foreach (PublicRepository::findAll('User') as $user){
            Notification::send($user,new \App\Notifications\ToolRequest($notifiy));
        }
        return json_encode(PublicRepository::findById('ToolRequest',$id,['part','user','issue','part.machine']));
    }
}
