<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Core extends Model
{
   protected $guarded = [];

    public function machine()
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }

    public function part()
    {
        return $this->belongsTo(PartNumber::class,'part_id');
    }
}
