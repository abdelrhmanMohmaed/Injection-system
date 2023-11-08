<?php

namespace App\Imports;

use App\Models\CylTemp;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class CylTempImport implements ToCollection, WithStartRow
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
            $data['nozzle_zone'] = $collection[2];
            $data['zone1'] = $collection[3];
            $data['zone2'] = $collection[4];
            $data['zone3'] = $collection[5];
            $data['zone4'] = $collection[6];
            $data['zone5'] = $collection[7];
            $data['zone6'] = $collection[8];
            $data['youke_zone'] = $collection[9];
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            array_push($arr, $data);
        }
        CylTemp::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
