<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainIssue extends Model
{
    protected $guarded=[];

    public function action()
    {
        return $this->belongsTo(MainAction::class,'action_id');
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class,'issue_id');
    }

    public function sub_issue()
    {
        return $this->belongsTo(SubIssue::class,'sub_issue_id');
    }
}
