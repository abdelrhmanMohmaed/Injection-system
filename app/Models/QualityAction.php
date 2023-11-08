<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityAction extends Model
{
    protected $guarded=[];

    public function request()
    {
        return $this->belongsTo(QualityRequest::class,'request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function issues()
    {
        return $this->hasMany(QualityIssue::class,'action_id');
    }
}
