<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
        'published_at',
        'image',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = static::generateSlug($post->title);
        });
    }

    public static function generateSlug($title)
    {
        $baseSlug = Str::slug($title);
        $suffix   = Str::uuid()->toString();
        $slug     = "{$baseSlug}-" . last(explode('-', $suffix));

        return $slug;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
