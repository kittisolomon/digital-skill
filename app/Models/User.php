<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'is_banned'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function adminDetail(): HasOne
    {
        return $this->hasOne(AdminDetail::class);
    }

    public function schoolDetail(): HasOne
    {
        return $this->hasOne(SchoolDetail::class);
    }

    public function teacherDetail(): HasOne
    {
        return $this->hasOne(TeacherDetail::class);
    }

    public function studentDetail(): HasOne
    {
        return $this->hasOne(StudentDetail::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(StudentDetail::class, 'school_id');
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    public function teacherEnrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class, 'teacher_id');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function courseProgress(): HasMany
    {
        return $this->hasMany(CourseProgress::class);
    }

    public function viewContents(): HasMany
    {
        return $this->hasMany(ViewContent::class);
    }

    public function assignedDevice(): HasOne
    {
        return $this->hasOne(Device::class);
    }

    public function deviceAssignedBy(): HasOne
    {
        return $this->hasOne(Device::class, 'assigned_by');
    }

    public function deviceUsageLogs(): HasMany
    {
        return $this->hasMany(DeviceUsageLog::class);
    }

    public function reportedSupportLogs(): HasMany
    {
        return $this->hasMany(DeviceSupportLog::class, 'reported_by');
    }
}
