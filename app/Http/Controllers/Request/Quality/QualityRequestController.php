<?php

namespace App\Http\Controllers\Request\Quality;

use App\Helper\QualityStatus;
use App\Models\QualityAction;
use App\Models\QualityIssue;
use App\Notifications\QualityRequest;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class QualityRequestController extends Controller
{
    public function index()
    {
        return view('Area.Requests.Quality.QualityRequest');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $part = PublicRepository::findById('PartNumber', $request->part_id);
        $data['machine_id'] = $part->machine_id;
        $req = PublicRepository::save('QualityRequest', $data);
        $req = PublicRepository::findById('QualityRequest', $req->id, ['part', 'user', 'machine']);
        $notifiy = [
            'user' => $req->user,
            'title' => 'New Quality Request',
            'message' => 'New Quality Request Opened By ' . $req->user->name . ' With Issue ' . $req->issue,
            'request_id' => $req->id,
            'type' => 'New Quality Request',
        ];
        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new QualityRequest($notifiy));
        }
        $res = json_encode($req);
        return $res;
    }

    public function getRequest()
    {
        $req = PublicRepository::findWhere('QualityRequest', ['status' => QualityStatus::Open], ['part', 'user', 'machine']);
        $req = json_encode($req);
        return $req;
    }

    public function addQualityAction(Request $request)
    {
        $req = PublicRepository::findById('QualityRequest', $request->request_id);
        $data = $request->except('issue_id');
        $data['time_end'] = Carbon::now();
        $data['total_time'] = Carbon::parse($req->created_at)->diffInMinutes($data['time_end']);
        $action = PublicRepository::save('QualityAction', $data);
        if ($request->issue_id) {
            $arr = [];
            foreach ($request->issue_id as $issue) {
                $issueData['issue_id'] = $issue;
                $issueData['action_id'] = $action->id;
                $issueData['created_at'] = Carbon::now();
                $issueData['updated_at'] = Carbon::now();
                array_push($arr, $issueData);
            }
            $actionIssues = QualityIssue::insert($arr);
            $req->update(['status' => QualityStatus::PendingProduction]);
        }else{
            $req->update(['status' => QualityStatus::Closed]);
        }
        $notifiy = [
            'user' => $action->user,
            'title' => 'Quality Action',
            'message' => $action->user->name . ' Take An Action On Request Number ' . $request->request_id,
            'request_id' => $request->request_id,
            'type' => 'New Quality Action',
        ];
        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new QualityRequest($notifiy));
        }
        $res = PublicRepository::findById('QualityRequest', $req->id, ['action', 'user', 'part', 'machine', 'action.issues', 'action.issues.issue', 'action.user']);
        return json_encode($res);
    }

    public function qualityActions()
    {
        $actions = PublicRepository::findWhere('QualityRequest',
            ['status' => QualityStatus::PendingProduction],
            ['action', 'part', 'machine', 'action.issues', 'action.user', 'action.issues.issue']);
        return view('Area.Requests.Quality.QualityActions', compact('actions'));
    }

    public function addProductionAction(Request $request)
    {
        $req = PublicRepository::findById('QualityRequest', $request->id, ['action']);
        $data['last_action'] = $request->action;
        $data['time_end'] = Carbon::now();
        $data['total_time'] = Carbon::parse($req->action->created_at)->diffInMinutes($data['time_end']);
        $data['status'] = QualityStatus::Closed;
        PublicRepository::update('QualityRequest', $request->id, $data);
        $res = PublicRepository::findById('QualityRequest', $request->id,
            ['action', 'user', 'part', 'machine', 'action.issues', 'action.user', 'action.issues.issue']);
        $notifiy = [
            'user' => $res->user,
            'title' => 'Production Action',
            'message' => 'Production Take An Action By (' . $request->action . ') On Quality Request Number ' . $res->id,
            'request_id' => $request->id,
            'type' => 'Production Action',
        ];
        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new QualityRequest($notifiy));
        }
        return json_encode($res);
    }

    public function allRequests()
    {
        $requests = PublicRepository::findAll('QualityRequest',
            ['action', 'user', 'part', 'machine', 'action.issues', 'action.issues.issue', 'action.user']);
//        dd($requests[0]->action->issues[0]->issue->name);
        return view('Area.Requests.Quality.AllRequests', compact('requests'));
    }
}
