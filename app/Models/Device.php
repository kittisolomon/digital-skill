<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    protected $fillable = [
        'serial_number',
        'qr_code',
        'user_id',
        'assigned_by',
        'model',
        'brand',
        'type',
        'status',
        'issued_at',
        'returned_at',
    ];

    protected $casts = [
        'issued_at' => 'date',
        'returned_at' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function usageLogs(): HasMany
    {
        return $this->hasMany(DeviceUsageLog::class);
    }

    public function currentUsageLog(): HasMany
    {
        return $this->hasMany(DeviceUsageLog::class)->whereNull('ended_at');
    }

    public function supportLogs(): HasMany
    {
        return $this->hasMany(DeviceSupportLog::class);
    }
}
