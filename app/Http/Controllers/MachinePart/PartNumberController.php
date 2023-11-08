<?php

namespace App\Http\Controllers\MachinePart;

use App\Http\Requests\PartRequest;
use App\Models\Machine;
use App\Models\PartNumber;
use App\Repository\PublicRepository;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PartNumberController extends Controller
{
    public function index(): View
    {
        $parts = PartNumber::with('machine')->get();

        return view('partNumber.index', compact('parts'));
    }

    public function create()
    {
        $machines = Machine::get();

        return view('partNumber.create',compact('machines'));
    }

    public function store(PartRequest $request)
    {
        try {
            PartNumber::create([
                'part_no'=> $request->part_no,
                'machine_id'=> $request->machine_id,
                'customer'=> $request->customer,
                'internal'=> $request->internal,
                'cell'=> $request->cell,
                'category'=> $request->category,
                'family'=> $request->family,

                'color'=> $request->color,
                'inj_type'=> $request->inj_type,
                'tool_no'=> $request->tool_no,
                'cav'=> $request->cav,
                'consumption_rate'=> $request->consumption_rate,
                'cycle_time'=> $request->cycle_time,
                'qty'=> $request->qty,
                'sorting'=> $request->sorting,

                'reject_rate'=> $request->reject_rate,
                'rate'=> $request->rate,
                'description'=> $request->description,

                'resin_pn1'=> $request->resin_pn1,
                'resin_pn2'=> $request->resin_pn2,
                'resin_pn3'=> $request->resin_pn3,
                'resin_pn4'=> $request->resin_pn4,

                'shot_wight1'=> $request->shot_wight1,
                'shot_wight2'=> $request->shot_wight2,
                'shot_wight3'=> $request->shot_wight3,
                'shot_wight4'=> $request->shot_wight4,
            ]);

            return redirect()->route('parts.index')->with('success','Part Created successfully');
        }catch (\Exception $e) {

            return back()->with('error','Something is wrong, Please try again..');
        }
   }

    public function edit(PartNumber $part)
    {
        $machines = Machine::get();

        return view('partNumber.edit',compact(['machines','part']));
    }

    public function update(PartRequest $request, PartNumber $part)
    {
        try {
            $part->update([
                'part_no'=> $request->part_no,
                'machine_id'=> $request->machine_id,
                'customer'=> $request->customer,
                'internal'=> $request->internal,
                'cell'=> $request->cell,
                'category'=> $request->category,
                'family'=> $request->family,

                'color'=> $request->color,
                'inj_type'=> $request->inj_type,
                'tool_no'=> $request->tool_no,
                'cav'=> $request->cav,
                'consumption_rate'=> $request->consumption_rate,
                'cycle_time'=> $request->cycle_time,
                'qty'=> $request->qty,
                'sorting'=> $request->sorting,

                'reject_rate'=> $request->reject_rate,
                'rate'=> $request->rate,
                'description'=> $request->description,

                'resin_pn1'=> $request->resin_pn1,
                'resin_pn2'=> $request->resin_pn2,
                'resin_pn3'=> $request->resin_pn3,
                'resin_pn4'=> $request->resin_pn4,

                'shot_wight1'=> $request->shot_wight1,
                'shot_wight2'=> $request->shot_wight2,
                'shot_wight3'=> $request->shot_wight3,
                'shot_wight4'=> $request->shot_wight4,
            ]);

            return redirect()->route('parts.index')->with('success','Part Updated successfully');
        }catch (\Exception $e) {

            return back()->with('error','Something is wrong, Please try again..');
        }
    }

    public function destroy(PartNumber $part)
    {
        $part->delete();
        return back()->with('success', 'Part Deleted successfully');
    }
}
