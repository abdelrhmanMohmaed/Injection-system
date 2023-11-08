<?php

namespace App\Http\Controllers;


use App\Models\BN;
use App\Models\ClosedCav;
use App\Models\Dosage;
use App\Models\GmData;
use App\Models\MainAction;
use App\Models\MainIssue;
use App\Models\MainRequest;
use App\Models\Plan;
use App\Models\Post;
use App\Models\QualityAction;
use App\Models\QualityIssue;
use App\Models\QualityRequest;
use App\Models\ToolAction;
use App\Models\ToolCounter;
use App\Models\ToolRequest;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notification()
    {
        $noti=auth()->user()->unreadNotifications;
        $res=json_encode($noti);
        return $res;
    }

    public function readNotification($id)
    {
        $userUnreadNotification = auth()->user()
            ->unreadNotifications
            ->where('id', $id)
            ->first();

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return 'done';
        }
    }

    public function markAsReadNotification()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return 'Done';
    }

    public function notificationHistory()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications=auth()->user()->notifications;
        return view('notifications',compact('notifications'));
    }

    public function reset()
    {
        GmData::all()->delete();
        BN::all()->delete();
        ClosedCav::all()->delete();
        MainIssue::all()->delete();
        MainRequest::all()->delete();
        MainAction::all()->delete();
        Plan::all()->delete();
        Post::all()->delete();
        QualityIssue::all()->delete();
        QualityAction::all()->delete();
        QualityRequest::all()->delete();
        ToolRequest::all()->delete();
        ToolAction::all()->delete();
        ToolCounter::all()->delete();
        DB::table('notifications')->get()->delete();
        return redirect()->back()->with('success','System Reset');

    }
}
