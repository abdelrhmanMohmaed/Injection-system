<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
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
use App\Models\Machine;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function uploadMachine()
    {
        return view('export.machine.upload');
    }

    public function uploadMachineData(Request $request)
    {

        // dd($request->all(), ($request->hasFile('excleFile')));

        if ($request->hasFile('excleFile')) {
            $return=[];
            $file_handle = fopen($request->excleFile, 'r');

            while (($line = fgetcsv($file_handle)) !== FALSE) {

                if(is_numeric($line[0])){
                    $data['type'] = $line[1] ?? null;
                    $data['tonnage'] = $line[2] ?? null;
                    $data['screw'] = $line[3] ?? null;
                    $data['robot'] = $line[4] ?? null;
                    $data['k'] = $line[5] ?? null;
                    $data['area'] = $line[6] ?? null;
                    $data['semi_auto'] = $line[7] ?? null;
                    $data['serial'] = $line[8] ?? null;
                    $data['seel_id'] = $line[9] ?? null;
                    $data['created_at'] = Carbon::now();
                    $data['updated_at'] = Carbon::now();
                    array_push($return,$data);
                }
            }

            try {
                Machine::insert($return);

                return back()->with('success','Data Uploaded');
            } catch (\Exception $e){

                return back()->with('error','Something is wrong, Please check you have valid data in file..'.$e->getMessage());
            }
        }
    }

    public function uploadPart()
    {
        return view('export.part.upload');
    }

    public function uploadPartData(Request $request)
    {
        if ($request->hasFile('excleFile')) {
            $return = [];
            $file_handle = fopen($request->excleFile, 'r');

            while (($line = fgetcsv($file_handle)) !== FALSE) {
                if ($line[0] != 'Part No') {

                    $data['part_no'] = $line[0];
                    $data['description'] = $line[1];
                    $data['customer'] = $line[2];
                    $data['internal'] = $line[3];
                    $data['cell'] = $line[4];
                    $data['qty'] = $line[5];
                    $data['cav'] = $line[6];
                    $data['cycle_time'] = $line[7];
                    $data['rate'] = $line[8];
                    $data['resin_pn1'] = $line[9];
                    $data['shot_wight1'] = $line[10];
                    $data['resin_pn2'] = ($line[11] == '') ? null : $line[11];
                    $data['shot_wight2'] = ($line[12] == '') ? null : $line[12];
                    $data['tool_no'] = $line[13];
                    $data['machine_id'] = $line[14];
                    $data['category'] = $line[15];
                    $data['sorting'] = $line[16];
                    $data['created_at'] = Carbon::now();
                    $data['updated_at'] = Carbon::now();
                    array_push($return, $data);
                }
            }

            try {

                PartNumber::insert($return);

                return back()->with('success','Data Uploaded');
            } catch (\Exception $e){

                return back()->with('error','Something is wrong, Please check you have valid data in file..'.$e->getMessage());
            }
        }
    }

    public function uploadParameter()
    {
        return view('export.parameter.upload');
    }

    public function uploadParameterData(Request $request)
    {
        if ($request->hasFile('cylTemp')) {
            \Maatwebsite\Excel\Facades\Excel::import(new CylTempImport(), $request->cylTemp);
        }
        if($request->hasFile('hotRunner')){
            \Maatwebsite\Excel\Facades\Excel::import(new hotRunnerImport(), $request->hotRunner);
        }
        if($request->hasFile('mould_temp')){
            \Maatwebsite\Excel\Facades\Excel::import(new mouldTempImport(), $request->mould_temp);
        }
        if($request->hasFile('injection')){
            \Maatwebsite\Excel\Facades\Excel::import(new injectionImport(), $request->injection);
        }
        if($request->hasFile('holding')){
            \Maatwebsite\Excel\Facades\Excel::import(new holdingImport(), $request->holding);
        }
        if($request->hasFile('dosage')){
            \Maatwebsite\Excel\Facades\Excel::import(new dosageImport(), $request->dosage);
        }
        if($request->hasFile('mould')){
            \Maatwebsite\Excel\Facades\Excel::import(new mouldImport(), $request->mould);
        }
        if($request->hasFile('ejector')){
            \Maatwebsite\Excel\Facades\Excel::import(new ejectorsImport(), $request->ejector);
        }
        if($request->hasFile('monitoring')){
            \Maatwebsite\Excel\Facades\Excel::import(new monitoringImport(), $request->monitoring);
        }
        if($request->hasFile('core')){
            \Maatwebsite\Excel\Facades\Excel::import(new coreImport(), $request->core);
        }
        if($request->hasFile('short_stroke')){
            \Maatwebsite\Excel\Facades\Excel::import(new shortStrokeImport(), $request->short_stroke);
        }

        return back()->with('success', 'File Uploaded');
    }


}
