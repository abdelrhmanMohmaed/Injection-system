<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolAction extends Model
{
    protected $guarded=[];

    public function request()
    {
        return $this->belongsTo(ToolRequest::class,'request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
