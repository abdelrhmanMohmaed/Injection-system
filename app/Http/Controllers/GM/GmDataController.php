<?php

namespace App\Http\Controllers\GM;

use App\Models\GmData;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GmDataController extends Controller
{
    public function index()
    {
        $gm=PublicRepository::findAll('GmData',['user','gm']);
        return view('Gm.index',compact('gm'));
    }

    public function create(Request $request)
    {
        $arr=[];
        foreach ($request->gm_id as $key=>$value){
            $data['gm_id']=$value['value'];
            $data['value']=$request->value[$key]['value'];
            $data['machine_id']=$request->machine_id;
            $data['shift']=$request->shift;
            $data['user_id']=auth()->id();
            $data['created_at']=Carbon::now();
            $data['updated_at']=Carbon::now();
            array_push($arr,$data);
        }
        $gm=GmData::insert($arr);
        return 'Done';
    }
}
