<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubIssue extends Model
{
    protected $guarded=[];

    public function issue()
    {
        return $this->belongsTo(Issue::class,'issue_id');
    }
}
