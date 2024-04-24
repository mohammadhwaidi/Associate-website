<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'location', 'admin_id', 'internship_image', 'available'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function enrollments()
    {
        return $this->hasMany(InternshipEnrollment::class, 'internship_id', 'id');
    }
}
