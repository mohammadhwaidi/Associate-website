<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipEnrollment extends Model
{
    protected $fillable = [
        'internship_id', 'user_id', 'enrollment_date', 'full_name', 'email', 'phone_number', 'address', 'education', 'cv'
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class, 'internship_id');
    }
}
