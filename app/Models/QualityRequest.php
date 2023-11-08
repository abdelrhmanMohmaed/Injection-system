<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityRequest extends Model
{
    protected $guarded=[];

    public function part()
    {
        return $this->belongsTo(PartNumber::class,'part_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }
    public function action()
    {
        return $this->hasOne(QualityAction::class ,'request_id');
    }
}
