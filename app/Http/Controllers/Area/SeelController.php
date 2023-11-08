<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;

class SeelController extends Controller
{
    public function index()
    {
        $seel = Machine::orderBy('seel_id','asc')->get()
            ->groupBy('seel_id');

        return view('seel.index',compact('seel'));
    }

    public function show($seel)
    {
        $area = Machine::where('seel_id',$seel)->get();
        $area = $area->groupBy('area');
        return view('seel.show', compact('area'));
    }
}
