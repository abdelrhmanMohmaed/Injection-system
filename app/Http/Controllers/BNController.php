<?php

namespace App\Http\Controllers;

use App\Models\BN;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BNController extends Controller
{
    public function index()
    {
        $users=PublicRepository::findAll('User');
        $bns=PublicRepository::findAll('BN',['part','machine']);
        return view('BN.index',compact('bns','users'));
    }
    public function filter(Request $request)
    {
        if($request->from){
            $from=date('Y-m-d',strtotime($request->from));
        }else{
            $from=date('Y-m-d',strtotime('2000-01-01'));
        }
        if($request->to){
            $to=date('Y-m-d',strtotime($request->to));
        }else{
            $to=Carbon::now();
        }

        $bns=BN::with(['part','machine','user'])
            ->whereBetween('created_at',[$from,$to]);
        if($request->shift){
            $bns=$bns->where('shift',$request->shift);
        }
        if($request->user_id){
            $bns=$bns->where('user_id',$request->user_id);
        }
        if($request->part_no){
            $bns=$bns->whereHas('part',function ($q) use ($request){
                $q->where('part_no','like','%'.$request->part_no.'%');
            });
        }
        if($request->machine_id){
            $bns=$bns->where('machine_id',$request->machine_id);
        }
        if($request->bn_id){
            $bns=$bns->where('id',$request->bn_id);
        }
        $bns=$bns->get();
        $users=PublicRepository::findAll('User');
        return view('BN.bnData',compact('bns','users'));
    }
}
