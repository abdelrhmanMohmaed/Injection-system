<?php

namespace App\Imports;

use App\Models\Mould;
use App\Models\PartNumber;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class mouldImport implements ToCollection, WithStartRow
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
            if ($collection[2] == 'Open' || $collection[2] == 'open') {
                $old = Mould::where(['part_id' => $data['part_id'], 'machine_id' => $collection[1]])->first();
                $data['speed1_open'] = $collection[3];
                $data['force1_open'] = $collection[4];
                $data['s_over1_open'] = $collection[5];
                $data['speed2_open'] = $collection[6];
                $data['force2_open'] = $collection[7];
                $data['s_over2_open'] = $collection[8];
                $data['speed3_open'] = $collection[9];
                $data['force3_open'] = $collection[10];
                $data['s_over3_open'] = $collection[11];
                $data['speed4_open'] = $collection[12];
                $data['force4_open'] = $collection[13];
                $data['s_over4_open'] = $collection[14];
                $data['speed5_open'] = $collection[15];
                $data['force5_open'] = $collection[16];
                $data['s_over5_open'] = $collection[17];
                $data['clamping_pressure'] = $collection[18];
                $data['mould_height'] = $collection[19];
                if ($old) {
                    $old->update($data);
                } else {
                    Mould::create($data);
                }
            } elseif ($collection[2] == 'Close' || $collection[2] == 'close') {
                $old = Mould::where(['part_id' => $data['part_id'], 'machine_id' => $collection[1]])->first();
                $data['speed1_close'] = $collection[3];
                $data['force1_close'] = $collection[4];
                $data['s_over1_close'] = $collection[5];
                $data['speed2_close'] = $collection[6];
                $data['force2_close'] = $collection[7];
                $data['s_over2_close'] = $collection[8];
                $data['speed3_close'] = $collection[9];
                $data['force3_close'] = $collection[10];
                $data['s_over3_close'] = $collection[11];
                $data['speed4_close'] = $collection[12];
                $data['force4_close'] = $collection[13];
                $data['s_over4_close'] = $collection[14];
                $data['speed5_close'] = $collection[15];
                $data['force5_close'] = $collection[16];
                $data['s_over5_close'] = $collection[17];
                if ($old) {
                    $old->update($data);
                } else {
                    Mould::create($data);
                }
            }
        }

    }

    public function startRow(): int
    {
        return 2;
    }

}
