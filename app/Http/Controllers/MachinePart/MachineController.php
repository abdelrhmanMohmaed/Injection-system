<?php

namespace App\Http\Controllers\MachinePart;

use App\Http\Requests\MachineRequest;
use App\Models\Machine;
use App\Models\Seel;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::with('seel')->get();

        return view('machine.index',compact('machines'));
    }

    public function show(Machine $machine,Request $request)
    {
        if ($request->ajax()){

            return view('partNumber.partials.machine', compact('machine'));
        };
    }

    public function create()
    {
        $seels = Seel::get();

        return view('machine.create',compact('seels'));
    }

    public function store(MachineRequest $request)
    {
        try {
            Machine::create([
                'seel_id'=> $request->seel,
                'area'=> $request->area,
                'robot'=> $request->robot,
                'K'=> $request->k,
                'semi_auto'=> $request->semi_auto,
                'serial'=> $request->serial,
                'type'=> $request->type,
                'tonnage'=> $request->tonnage,
                'screw'=> $request->screw,
            ]);

            return redirect()->route('machines.index')->with('success','Machine Created successfully');
        }catch (\Exception $e) {

            return back()->with('error','Something is wrong, Please try again..');
        }
    }

    public function edit(Machine $machine)
    {
        $seels = Seel::get();

        return view('machine.edit',compact(['machine','seels']));
    }

    public function update(MachineRequest $request, Machine $machine)
    {
        try {
            $machine->update([
                'seel_id'=> $request->seel,
                'area'=> $request->area,
                'robot'=> $request->robot,
                'K'=> $request->k,
                'semi_auto'=> $request->semi_auto,
                'serial'=> $request->serial,
                'type'=> $request->type,
                'tonnage'=> $request->tonnage,
                'screw'=> $request->screw,
            ]);

            return redirect()->route('machines.index')->with('success','Machine Updated successfully');
        }catch (\Exception $e) {

            return back()->with('error','Something is wrong, Please try again..');
        }
    }

}
