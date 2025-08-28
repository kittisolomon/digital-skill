<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeviceSupportLog extends Model
{
    protected $fillable = [
        'device_id',
        'reported_by',
        'issue',
        'action_taken',
        'resolved_at',
        'status',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
