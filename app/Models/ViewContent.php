<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ViewContent extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'course_content_id',
        'is_viewed',
    ];

    protected $casts = [
        'is_viewed' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function courseContent(): BelongsTo
    {
        return $this->belongsTo(CourseContent::class, 'course_content_id');
    }
}
