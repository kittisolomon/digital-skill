<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseContent extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'about',
        'video_link',
        'video_link_id',
        'content',
        'position',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function progress(): HasMany
    {
        return $this->hasMany(CourseProgress::class, 'course_content_id');
    }

    public function viewContents(): HasMany
    {
        return $this->hasMany(ViewContent::class, 'course_content_id');
    }
}
