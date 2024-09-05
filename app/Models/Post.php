<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'uploaded',
        'image_url',
        'category_id',
        'user_id',
    ];

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }

public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}


    protected static function booted()
    {
    static::creating(function ($post) {
        $post->user_id = Auth::id();
    });
    }

}