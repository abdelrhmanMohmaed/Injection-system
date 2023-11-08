<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    protected $guarded=[];

    public function part(): BelongsTo
    {
        return $this->belongsTo(PartNumber::class,'part_id');
    }

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }
}
