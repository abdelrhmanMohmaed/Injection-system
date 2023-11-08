<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CylTemp extends Model
{
    protected $guarded=[];


    public function part()
    {
        return $this->belongsTo(PartNumber::class,'part_id');
    }
}
