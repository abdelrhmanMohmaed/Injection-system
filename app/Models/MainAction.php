<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainAction extends Model
{
     protected $guarded=[];

    public function request()
    {
        return $this->belongsTo(MainRequest::class,'request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function issue()
    {
        return $this->hasOne(MainIssue::class,'issue_id');
    }

    public function issue_action()
    {
        return $this->hasOne(MainIssue::class,'action_id');
    }

    public function sub_issue()
    {
        return $this->hasOne(MainIssue::class,'sub_issue_id');
    }
}
