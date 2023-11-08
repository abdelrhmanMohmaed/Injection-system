<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityIssue extends Model
{
    protected $guarded=[];

    public function action()
    {
        return $this->belongsTo(QualityAction::class,'action_id');
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class,'issue_id');
    }
}
