<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'activity_date', 'admin_id', 'image_path'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
