<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'address',
        'status',
        'course_id',
    ];

    /**
     * Get the course the student is enrolled in.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get display ID (e.g. STU-001).
     */
    public function getDisplayIdAttribute(): string
    {
        return $this->student_id ?? ('STU-' . str_pad((string) $this->id, 3, '0', STR_PAD_LEFT));
    }
}
