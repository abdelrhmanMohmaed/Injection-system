<?php

namespace App\Http\Controllers;

use App\Exports\PartExport;
use App\Imports\PlanImport;
use App\Models\Plan;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class PlanController extends Controller
{
    public function index(): View
    {
        $plans = Plan::with(['machine', 'part'])->get();

        return view('plan.index', compact('plans'));
    }

    public function download()
    {
        return (new PartExport())->download('Plan.xlsx');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new PlanImport(), $request->file);

            return back()->with('success', 'Plan Uploaded');
        }
    }

    public function getPlan($id)
    {
        $plan = PublicRepository::findById('Plan', $id);
        $plans = PublicRepository::findWhere('Plan', ['machine_id' => $plan->machine_id, 'week' => $plan->week], ['part']);
        return view('Plan.edit', compact('plans', 'plan'));
    }

    public function getPlanForMachine($id)
    {
        $week = Carbon::now();
        $week->setWeekStartsAt(Carbon::SATURDAY);
        $week->setWeekEndsAt(Carbon::FRIDAY);
        $weekNo = $week->weekOfYear;
        $plans = Plan::where(['machine_id' => $id, 'week' => $weekNo])->orderBy('priority', 'asc')->get();
        return view('Area.plan', compact('plans'));
    }
    public function getPlanForMachine2($id)
    {
        $week = Carbon::now();
        $week->setWeekStartsAt(Carbon::SATURDAY);
        $week->setWeekEndsAt(Carbon::FRIDAY);
        $weekNo = $week->weekOfYear;

        $plans = Plan::with('part')->where(['machine_id' => $id, 'week' => $weekNo])
            ->orderBy('priority', 'asc')
            ->get();

        return json_encode($plans);
    }

    public function edit(Request $request)
    {
        $priority = $request->priority;

        foreach ($request->id as $key => $value) {

            $plan = Plan::where('id',$value)->first();

            if($plan->missing || $plan->missing == 0){

                $var = $request->demand[$key] - $plan->demand;

                if ($var != 0 && $plan->missing != null) {
                    $data['missing'] = $plan->missing + $var;
                }

            }

            $data['priority'] = $priority[$key];
            $data['demand'] = $request->demand[$key];

            PublicRepository::update('Plan', $value,$data);
        }
        return back()->with('success', 'Plan Updated');
    }

    public function delete($id)
    {
        PublicRepository::delete('Plan', $id);
        return back()->with('success', 'Plan Deleted');
    }

    public function destroy(Request $request)
    {
        try {

           Plan::whereIn('id',$request->ids)->delete();
           return response()->json(['success' => "Plan deleted successfully"]);
        }catch (\Exception $e){

            return response()->json(['error' => "something is wrong, Please try again.."]);
        }
    }
}
