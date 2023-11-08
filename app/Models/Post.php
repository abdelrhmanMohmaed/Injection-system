<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['user_id','part_id', 'machine_id', 'bn_id',
        'counter' , 'io', 'nio', 'cav', 'cycle_time', 'type', 'shift'];

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function part(): BelongsTo
    {
        return $this->belongsTo(PartNumber::class,'part_id');
    }

    public function bn(): BelongsTo
    {
        return $this->belongsTo(BN::class,'bn_id');
    }
}
