<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'duration_months',
        'instructor',
        'description',
    ];

    /**
     * Get the students enrolled in this course.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
