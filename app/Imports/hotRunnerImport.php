<?php

namespace App\Imports;

use App\Models\HotRunnerTemp;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class hotRunnerImport implements ToCollection, WithStartRow
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
            $data['zone1'] = $collection[2];
            $data['zone2'] = $collection[3];
            $data['zone3'] = $collection[4];
            $data['zone4'] = $collection[5];
            $data['zone5'] = $collection[6];
            $data['zone6'] = $collection[7];
            $data['zone7'] = $collection[8];
            $data['zone8'] = $collection[9];
            $data['zone9'] = $collection[10];
            $data['zone10'] = $collection[11];
            $data['zone11'] = $collection[12];
            $data['zone12'] = $collection[13];
            $data['zone13'] = $collection[14];
            $data['zone14'] = $collection[15];
            $data['zone15'] = $collection[16];
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            array_push($arr, $data);
        }
        HotRunnerTemp::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
