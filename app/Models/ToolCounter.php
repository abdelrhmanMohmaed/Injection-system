<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolCounter extends Model
{
    protected $guarded=[];

    public function action()
    {
        return $this->belongsTo(ToolCounter::class,'action_id');
    }
}
