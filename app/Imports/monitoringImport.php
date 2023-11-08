<?php

namespace App\Imports;


use App\Models\Machine;
use App\Models\Monitoring;
use App\Models\PartNumber;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class monitoringImport implements ToCollection, WithStartRow
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
            $data['injection_time'] = $collection[2];
            $data['max_inject_press'] = $collection[4];
            $data['cunshining'] = $collection[5];
            $data['total_cycle_time'] = $collection[6];
            $machine = Machine::find($collection[1]);
            if ($machine->type == 'Arburg') {
                $data['inj_press_s_over'] = $collection[3];
            } elseif ($machine->type == 'Engel') {
                $data['plasticizing_time'] = $collection[3];
            }
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            array_push($arr, $data);
        }
        Monitoring::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
