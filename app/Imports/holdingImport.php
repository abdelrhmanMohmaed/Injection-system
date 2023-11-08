<?php

namespace App\Imports;

use App\Models\Holding;
use App\Models\Machine;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class holdingImport implements ToCollection, WithStartRow
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
            $machine = Machine::find($collection[1]);
            if ($machine->type == 'Arburg') {
                $data['speed'] = $collection[2];
                $data['ramp_time'] = $collection[3];
                $data['press1'] = $collection[4];
                $data['time1'] = $collection[5];
                $data['press2'] = $collection[6];
                $data['time2'] = $collection[7];
                $data['press3'] = $collection[8];
                $data['time3'] = $collection[9];
                $data['press4'] = $collection[10];
                $data['time4'] = $collection[11];
                $data['press5'] = $collection[12];
                $data['time5'] = $collection[13];
                $data['switch_over_volume'] = $collection[14];
                $data['cooling_time'] = $collection[15];
            } elseif ($machine->type == 'Engel') {
                $data['time1'] = $collection[2];
                $data['press1'] = $collection[3];
                $data['time2'] = $collection[4];
                $data['press2'] = $collection[5];
                $data['time3'] = $collection[6];
                $data['press3'] = $collection[7];
                $data['time4'] = $collection[8];
                $data['press4'] = $collection[9];
                $data['time5'] = $collection[10];
                $data['press5'] = $collection[11];
                $data['switch_over_volume'] = $collection[12];
                $data['holding_pressure_time'] = $collection[13];
            }

            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            array_push($arr, $data);
        }
        Holding::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
