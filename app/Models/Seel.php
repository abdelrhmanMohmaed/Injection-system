<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seel extends Model
{
    protected $fillable = ['name'];

    public function seels(): HasMany
    {
        return $this->hasMany(Machine::class,'seel_id');
    }

}
