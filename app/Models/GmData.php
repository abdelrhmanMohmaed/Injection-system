<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GmData extends Model
{
    protected $guarded=[];

    public function gm()
    {
        return $this->belongsTo(Gm::class,'gm_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
