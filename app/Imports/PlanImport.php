<?php

namespace App\Imports;

use App\Models\PartNumber;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PlanImport implements ToCollection,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $arr=[];
        foreach ($collection as $collection) {
            if(!$part=PartNumber::where('part_no', $collection[1])->first()){
              continue;
            }
            $data['machine_id'] = $collection[0];
            $data['part_id'] = PartNumber::where('part_no', $collection[1])->first()->id;
            $data['demand'] = $collection[2];
            $data['week'] = $collection[3];
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            array_push($arr,$data);
        }
        Plan::insert($arr);
    }
    public function startRow(): int
    {
        return 2;
    }

}
