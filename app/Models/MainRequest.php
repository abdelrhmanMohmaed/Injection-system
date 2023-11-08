<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainRequest extends Model
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

    public function sub_issue()
    {
        return $this->belongsTo(SubIssue::class,'sub_issue_id');
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class,'issue_id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }
    public function action()
    {
        return $this->hasOne(MainAction::class ,'request_id');
    }
}
