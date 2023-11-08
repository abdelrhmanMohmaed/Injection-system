<?php

namespace App\Imports;

use App\Models\MouldTemp;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class mouldTempImport implements ToCollection,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $arr=[];
        foreach ($collection as $collection) {
            if(!$part=PartNumber::where('part_no', $collection[0])->first()){
              continue;
            }
            $data['part_id'] = PartNumber::where('part_no', $collection[0])->first()->id;
            $data['machine_id'] = $collection[1];
            $data['ejector_side'] = $collection[2];
            $data['nozzle_side'] = $collection[3];
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            array_push($arr,$data);
        }
        MouldTemp::insert($arr);
    }
    public function startRow(): int
    {
        return 2;
    }

}
