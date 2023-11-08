<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $guarded=[];

    public function subIssue()
    {
        return $this->hasMany(SubIssue::class,'issue_id');
    }
}
