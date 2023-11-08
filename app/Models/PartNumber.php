<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PartNumber extends Model
{
    protected $fillable = [
        'machine_id','part_no','description','customer','internal','cell','family','qty','cav','cycle_time',
        'reject_rate','rate', 'color','tool_no','inj_type','cycle_time','category','sorting','consumption_rate',
        'resin_pn1','resin_pn2','resin_pn3','resin_pn4','shot_wight1','shot_wight2','shot_wight3','shot_wight4'
    ];

    public function plan(): HasOne
    {
        $week = Carbon::now();
        $week->setWeekStartsAt(Carbon::SUNDAY);
        $week->setWeekEndsAt(Carbon::SATURDAY);
        $weekNo = $week->weekOfYear;
        return $this->hasOne(Plan::class,'plan_id')->where('week',$weekNo);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class,'part_id');
    }

    public function ejectors(): HasOne
    {
        return $this->hasOne(Ejectors::class,'part_id');
    }

    public function mould(): HasOne
    {
        return $this->hasOne(Mould::class,'part_id');
    }

    public function core(): HasOne
    {
        return $this->hasOne(Core::class, 'part_id');
    }

    public function cylTemp(): HasOne
    {
        return $this->hasOne(CylTemp::class, 'part_id');
    }

    public function dosage(): HasOne
    {
        return $this->hasOne(Dosage::class, 'part_id');
    }

    public function holding(): HasOne
    {
        return $this->hasOne(Holding::class, 'part_id');
    }

    public function hotRunner(): HasOne
    {
        return $this->hasOne(HotRunnerTemp::class, 'part_id');
    }

    public function injection(): HasOne
    {
        return $this->hasOne(Injection::class, 'part_id');
    }

    public function monitoring(): HasOne
    {
        return $this->hasOne(Monitoring::class, 'part_id');
    }

    public function mouldTemp(): HasOne
    {
        return $this->hasOne(MouldTemp::class, 'part_id');
    }

    public function shortStroke(): HasOne
    {
        return $this->hasOne(ShortStroke::class, 'part_id');
    }

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class, 'machine_id');
    }

}
