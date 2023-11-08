<?php

namespace App\Http\Controllers\Request;

use App\Helper\RequestStatus;
use App\Models\ToolRequest;
use App\Repository\PublicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ToolRequestController extends Controller
{
    public function index()
    {
        return view('Area.Requests.allToolRequest');
    }

    public function requestView()
    {
        return view('Area.Requests.productionView');
    }
    public function requestForTool()
    {
        $requests=ToolRequest::with(['part','user','issue','part.machine'])
            ->whereIn('status',[RequestStatus::Open,RequestStatus::InToolShop,RequestStatus::RejectFromProduction])
            ->orderBy('priority','asc')
            ->orderBy('importance','desc')
            ->get();
        $res=json_encode($requests);
        return $res;
    }

    public function requestForProduction()
    {
        $requests=ToolRequest::with(['part','user','issue','part.machine'])
            ->whereIn('status',[RequestStatus::CloseFromTool,RequestStatus::NeedToolShop])
            ->orderBy('priority','asc')
            ->orderBy('importance','desc')
            ->get();
        $res=json_encode($requests);
        return $res;
    }

    public function create2(Request $request)
    {
        $data=$request->except('_token','machine_id');
        $tool=PublicRepository::save('ToolRequest',$data);
        $tool=PublicRepository::findById('ToolRequest',$tool->id,['part','user','issue','part.machine']);
        $notifiy=[
            'user'=>$tool->user,
            'title'=>'New Tool Request',
            'message'=>'New Tool Request Opened By '.$tool->user->name.' With Issue '.$tool->issue->name,
            'tool_id'=>$tool->id,
            'type'=>'New Tool Request',
        ];
        foreach (PublicRepository::findAll('User') as $user){
           Notification::send($user,new \App\Notifications\ToolRequest($notifiy));
        }
        $res=json_encode($tool);
        return $res;
    }

    public function allRequests()
    {
        $all=PublicRepository::findAll('ToolRequest',
            ['part','user','issue','part.machine','action','action.user']);
        return view('Area.Requests.ToolAndAction',compact('all'));
    }

}
