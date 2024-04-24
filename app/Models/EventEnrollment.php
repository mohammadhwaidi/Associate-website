<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventEnrollment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'event_id', 'enrollment_date', 'full_name', 'email', 'phone_number', 'address', 'user_id'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
