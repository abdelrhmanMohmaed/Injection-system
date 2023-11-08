<?php

namespace App\Imports;

use App\Models\Core;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class coreImport implements ToCollection, WithStartRow
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
            $data['fwd_speed'] = $collection[2];
            $data['fwd_pressure'] = $collection[3];
            $data['interval_speed'] = $collection[4];
            $data['interval_pressure'] = $collection[5];
            $data['bwd_speed'] = $collection[6];
            $data['bwd_pressure'] = $collection[7];
            $data['count'] = $collection[8];
            $data['time'] = $collection[9];
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            array_push($arr, $data);
        }
        Core::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
