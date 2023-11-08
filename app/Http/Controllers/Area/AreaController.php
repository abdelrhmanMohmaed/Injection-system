<?php

namespace App\Http\Controllers\Area;

use App\Helper\IssueType;
use App\Http\Controllers\Controller;
use App\Models\Machine;
use App\Repository\PublicRepository;
use Carbon\Carbon;

class AreaController extends Controller
{

    public function index()
    {
        $machines = Machine::get();
        $areas = $machines->groupBy('area');

        return view('Area.index', compact('areas'));
    }

    public function details()
    {
        return view('Area.show');
    }

    public function show($number)
    {
        return view('Area.show');
    }






//    public function index2()
//    {
//        $week = Carbon::now();
//        $week->setWeekStartsAt(Carbon::SUNDAY);
//        $week->setWeekEndsAt(Carbon::SATURDAY);
//        $weekNo = $week->weekOfYear;
//        $area = Machine::with(['parts', 'plans' => function ($q) use ($weekNo) {
//            $q->where(['week' => $weekNo])
//                ->orderBy('priority', 'asc');
//        }, 'plans.part','posts'])->get();
//        $area = $area->groupBy('area');
//        return view('Area.index', compact('area'));
//    }

    public function index3($segment)
    {
        $week = Carbon::now('Africa/Cairo');
        $week->setWeekStartsAt(Carbon::SATURDAY);
        $week->setWeekEndsAt(Carbon::FRIDAY);
        $weekNo = $week->weekOfYear;

        $area = Machine::with(['parts', 'plans' => function ($q) use ($weekNo) {
            $q->where(['week' => $weekNo])
                ->orderBy('priority', 'asc');
        }, 'plans.part', 'posts', 'posts.part']);

        if (is_numeric($segment)) {

            $area = $area->where('area', $segment)->get();
        } else {

            $area = $area->orderBy('priority', 'asc')->get();
        }

        $area = $area->groupBy('area');

//        return  $area ;
        return json_encode($area);
    }


    public function areaNumber($number)
    {
        $week = Carbon::now();
        $week->setWeekStartsAt(Carbon::SUNDAY);
        $week->setWeekEndsAt(Carbon::SATURDAY);
        $weekNo = $week->weekOfYear;
        $area = Machine::with(['parts', 'plans' => function ($q) use ($weekNo) {
            $q->where(['week' => $weekNo])
                ->orderBy('priority', 'asc');
        }, 'plans.part', 'posts'])
            ->where('area', $number)
            ->get();
        $area = $area->groupBy('area');
        return view('Area.index', compact('area'));
    }


    public function makePost($id)
    {
        $machine = PublicRepository::findById('Machine', $id, ['parts']);
        return view('Area.post', compact('machine'));
    }

    public function makePost2($id)
    {
        $machine = PublicRepository::findById('Machine', $id, ['parts']);
        return json_encode($machine);
    }

    public function RequestModel($id)
    {
        $machine = PublicRepository::findById('Machine', $id, ['parts']);
        $issues = PublicRepository::findWhere('Issue', ['type' => IssueType::Tooling]);
        $mainIssues = PublicRepository::findWhere('Issue', ['type' => IssueType::Maintenance], ['subIssue']);
        $users = PublicRepository::findAll('User');
        $array = ['machine' => $machine, 'issues' => $issues, 'mainIssue' => $mainIssues, 'users' => $users];
        $res = json_encode($array);
        return $res;
//        return view('Area.request',compact('machine','issues','users'));
    }


}
