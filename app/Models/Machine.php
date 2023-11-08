<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static get()
 */
class Machine extends Model
{
    protected $fillable = [
        'seel_id','type','tonnage','screw','robot','K','area','semi_auto','serial'
    ];

//    protected $maps = [
//        '1k' => 'k',
//    ];
//    protected $append = ['k'];
//
//    public function getKAttribute()
//    {
//        return $this->attributes['1k'];
//    }
    public function parts(): HasMany
    {
        return $this->hasMany(PartNumber::class,'machine_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class,'machine_id');
    }
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class,'machine_id');
    }
    public function seel(): BelongsTo
    {
        return $this->belongsTo(Seel::class,'seel_id');
    }
}
