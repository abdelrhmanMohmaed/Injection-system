<?php

namespace App\Http\Controllers\MachinePart;

use App\Http\Requests\PartRequest;
use App\Imports\coreImport;
use App\Imports\CylTempImport;
use App\Imports\dosageImport;
use App\Imports\ejectorsImport;
use App\Imports\holdingImport;
use App\Imports\hotRunnerImport;
use App\Imports\injectionImport;
use App\Imports\monitoringImport;
use App\Imports\mouldImport;
use App\Imports\mouldTempImport;
use App\Imports\shortStrokeImport;
use App\Models\PartNumber;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParametersController extends Controller
{

    public function index($param)
    {
        $items=PublicRepository::findAll($param,['part']);
        $view='Parameters.'.$param;
        return view($view,compact('items'));
    }
    public function Edit($param,$id,Request $request)
    {
        $part=PublicRepository::findFirst('PartNumber',['part_no'=>$request->part_no]);
        if($part){
            $data=$request->except('_token','part_no');
            $data['part_id']=$part->id;
            PublicRepository::update($param,$id,$data);
            return back()->with('success','Parameter Updated');
        }else{
            return back()->withErrors('This Part Not Found');
        }
    }
    public function get($param,$id)
    {
        $item=PublicRepository::findById($param,$id,['part']);
        $view='Parameters.'.$param.'Edit';
        return view($view,compact('item'));
    }

    public function create($param,Request $request)
    {
        $part=PublicRepository::findFirst('PartNumber',['part_no'=>$request->part_no]);
        if($part){
            $data=$request->except('_token','part_no');
            $data['part_id']=$part->id;
            PublicRepository::save($param,$data);
            return back()->with('success','Parameter Added');
        }else{
            return back()->withErrors('This Part Not Found');
        }
    }
}
