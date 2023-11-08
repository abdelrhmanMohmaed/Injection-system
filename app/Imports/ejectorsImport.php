<?php

namespace App\Imports;

use App\Models\Ejectors;
use App\Models\PartNumber;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class ejectorsImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $collection) {
            if (!$part = PartNumber::where('part_no', $collection[0])->first()) {
                continue;
            }
            $data['part_id'] = PartNumber::where('part_no', $collection[0])->first()->id;
            $data['machine_id'] = $collection[1];
            if ($collection[2] == 'Advance' || $collection[2] == 'advance') {
                $old = Ejectors::where(['part_id' => $data['part_id'], 'machine_id' => $collection[1]])->first();
                $data['speed1_advance'] = $collection[3];
                $data['force1_advance'] = $collection[4];
                $data['s_over1_advance'] = $collection[5];
                $data['speed2_advance'] = $collection[6];
                $data['force2_advance'] = $collection[7];
                $data['s_over2_advance'] = $collection[8];
                $data['speed3_advance'] = $collection[9];
                $data['force3_advance'] = $collection[10];
                $data['s_over3_advance'] = $collection[11];
                if ($old) {
                    $old->update($data);
                } else {
                    Ejectors::create($data);
                }
            } else {
                $old = Ejectors::where(['part_id' => $data['part_id'], 'machine_id' => $collection[1]])->first();

                $data['speed1_retract'] = $collection[3];
                $data['force1_retract'] = $collection[4];
                $data['s_over1_retract'] = $collection[5];
                $data['speed2_retract'] = $collection[6];
                $data['force2_retract'] = $collection[7];
                $data['s_over2_retract'] = $collection[8];
                $data['speed3_retract'] = $collection[9];
                $data['force3_retract'] = $collection[10];
                $data['s_over3_retract'] = $collection[11];
                if ($old) {
                    $old->update($data);
                } else {
                    Ejectors::create($data);
                }
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }

}
