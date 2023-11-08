<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BN extends Model
{
    protected $guarded=[];

    public function post()
    {
        return $this->hasOne(Post::class,'bn_id');
    }
    public function machine()
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }
    public function part()
    {
        return $this->belongsTo(PartNumber::class,'part_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ejectors()
    {
        return $this->belongsTo(Ejectors::class,'ejector_id');
    }

    public function mould()
    {
        return $this->belongsTo(Mould::class,'mould_id');
    }

    public function core()
    {
        return $this->belongsTo(Core::class, 'core_id');
    }

    public function cylTemp()
    {
        return $this->belongsTo(CylTemp::class, 'cyl_temp_id');
    }

    public function dosage()
    {
        return $this->belongsTo(Dosage::class, 'dosage_id');
    }

    public function holding()
    {
        return $this->belongsTo(Holding::class, 'holding_id');
    }

    public function hotRunner()
    {
        return $this->belongsTo(HotRunnerTemp::class, 'hot_runner_id');
    }

    public function injection()
    {
        return $this->belongsTo(Injection::class, 'injection_id');
    }

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class, 'monitoring_id');
    }

    public function mouldTemp()
    {
        return $this->belongsTo(MouldTemp::class, 'mould_temp_id');
    }
    public function shortStroke()
    {
        return $this->hasOne(ShortStroke::class, 'part_id');
    }
}
