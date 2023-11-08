<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClosedCav extends Model
{
    protected $guarded = [];

    public function action(): BelongsTo
    {
        return $this->belongsTo(ToolAction::class, 'action_id');
    }
}
