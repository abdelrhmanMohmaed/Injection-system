<?php

namespace App\Imports;

use App\Helper\IssueType;
use App\Models\Issue;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class IssueImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $arr = [];
        foreach ($collection as $collection) {
            $data['name'] = $collection[1];
            $data['type'] = IssueType::Quality;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            array_push($arr, $data);
        }
        Issue::insert($arr);
    }

    public function startRow(): int
    {
        return 2;
    }

}
