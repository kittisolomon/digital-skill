<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'reg_number',
        'school_type',
        'ownership_type',
        'email',
        'phone_no',
        'state',
        'lga',
        'address',
        'admin_name',
        'admin_phone',
        'admin_email',
        'photo_link',
        'photo_link_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teachers(): HasMany
    {
        return $this->hasMany(TeacherDetail::class, 'school_id');
    }
}
