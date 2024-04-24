<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    use HasFactory;
    protected $table = 'slideshows';

    protected $primaryKey = 'SlideshowID';

    protected $fillable = ['Title', 'SlideshowImage', 'Caption', 'AdminID'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'AdminID');
    }
}
