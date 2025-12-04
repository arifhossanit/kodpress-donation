<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['job_post_id', 'applicant_name', 'applicant_email', 'applicant_phone', 'cover_letter', 'resume_path', 'status', 'notes', 'reviewed_at'];

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }
}
