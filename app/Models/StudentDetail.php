<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentDetail extends Model
{
    protected $fillable = [
        'user_id',
        'school_id',
        'gender',
        'phone',
        'dob',
        'state',
        'lga',
        'address',
        'landmark',
        'photo_link',
        'photo_link_id',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(User::class, 'school_id');
    }
}
