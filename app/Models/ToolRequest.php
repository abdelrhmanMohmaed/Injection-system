<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolRequest extends Model
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

    public function issue()
    {
        return $this->belongsTo(Issue::class,'issue_id');
    }

    public function action()
    {
        return $this->hasOne(ToolAction::class ,'request_id');
    }
}
