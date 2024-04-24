<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'publish_date', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
