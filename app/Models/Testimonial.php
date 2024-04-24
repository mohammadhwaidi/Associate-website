<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    protected $primaryKey = 'TestimonialID';
    protected $fillable = ['Content', 'TestimonialImage', 'PublishDate', 'UserID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
