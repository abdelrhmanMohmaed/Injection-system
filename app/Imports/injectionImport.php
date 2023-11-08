<?php

namespace App\Imports;

use App\Models\Injection;
use App\Models\Machine;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class injectionImport implements ToCollection, WithStartRow
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
                $data['speed1'] = $collection[2];
                $data['press1'] = $collection[3];
                $data['s_over1'] = $collection[4];
                $data['speed2'] = $collection[5];
                $data['press2'] = $collection[6];
                $data['s_over2'] = $collection[7];
                $data['speed3'] = $collection[8];
                $data['press3'] = $collection[9];
                $data['s_over3'] = $collection[10];
                $data['speed4'] = $collection[11];
                $data['press4'] = $collection[12];
                $data['s_over4'] = $collection[13];
                $data['speed5'] = $collection[14];
                $data['press5'] = $collection[15];
                $data['s_over5'] = $collection[16];
            } elseif ($machine->type == 'Engel') {
                $data['s_over1'] = $collection[2];
                $data['speed1'] = $collection[3];
                $data['s_over2'] = $collection[4];
                $data['speed2'] = $collection[5];
                $data['s_over3'] = $collection[6];
                $data['speed3'] = $collection[7];
                $data['s_over4'] = $collection[8];
                $data['speed4'] = $collection[9];
                $data['s_over5'] = $collection[10];
                $data['speed5'] = $collection[11];
                $data['injection_pressure'] = $collection[12];
                $data['cooling_time'] = $collection[13];
            }
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            array_push($arr, $data);
        }
        Injection::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
