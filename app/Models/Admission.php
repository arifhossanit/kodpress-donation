<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name','gender','date_of_birth','place_of_birth','postal_code','address','city','email','phone','nationality',
        'identification_document_no','identification_expiry_date',
        'education_level','other_qualifications',
        'employment_status','professional_training','attended_training_courses','desired_course',
        'training_regulations_accepted','personal_data_disclosure_authorized',
        'notes','status'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'identification_expiry_date' => 'date',
        'attended_training_courses' => 'boolean',
        'training_regulations_accepted' => 'boolean',
        'personal_data_disclosure_authorized' => 'boolean',
    ];

    public function getFullNameAttribute()
    {
        return $this->name;
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
