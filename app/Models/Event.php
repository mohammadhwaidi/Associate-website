<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'title', 'description', 'event_date', 'location', 'admin_id', 'events_image'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function enrollments()
    {
        return $this->hasMany(EventEnrollment::class, 'event_id', 'id');
    }
}
