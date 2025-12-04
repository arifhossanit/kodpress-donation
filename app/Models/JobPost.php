<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'title', 'slug', 'description', 'requirements', 'location', 'employment_type', 'salary_min', 'salary_max', 'active', 'deadline'];

    protected $casts = [
        'active' => 'boolean',
        'deadline' => 'datetime',
    ];

    public function department()
    {
        return $this->belongsTo(JobDepartment::class, 'department_id');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'job_post_id');
    }
}
