<?php

namespace App\Imports;


use App\Models\Dosage;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class dosageImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $arr = [];
        foreach ($collection as $collection) {
            if (!$part = PartNumber::where('part_no', $collection[0])->first()) {
                continue;
            }
            $data['part_id'] = PartNumber::where('part_no', $collection[0])->first()->id;
            $data['machine_id'] = $collection[1];
            $data['circumferance_speed'] = $collection[2];
            $data['back_pressure'] = $collection[3];
            $data['volume'] = $collection[4];
            $data['decomperssion_speed'] = $collection[5];
            $data['decomperssion_volume'] = $collection[6];
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            array_push($arr, $data);
        }
        Dosage::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
