<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone',
        'gender',
        'country',
        'state',
        'address',
        'company',
        'job',
        'about',
        'photo_link',
        'photo_link_id',
    ];

    /**
     * Get the user that owns the admin detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
