<?php

namespace App\Imports;

use App\Models\PartNumber;
use App\Models\ShortStroke;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class shortStrokeImport implements ToCollection, WithStartRow
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
            $data['speed1'] = $collection[2];
            $data['force1'] = $collection[3];
            $data['s_over1'] = $collection[4];
            $data['speed2'] = $collection[5];
            $data['force2'] = $collection[6];
            $data['s_over2'] = $collection[7];
            $data['count'] = $collection[8];
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            array_push($arr, $data);
        }
        ShortStroke::insert($data);
    }

    public function startRow(): int
    {
        return 2;
    }

}
