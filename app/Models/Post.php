<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','category_id', 'meta_tag','meta_keyword','path','status','description'];

    public static function boot()
    {
        parent::boot();

        // Automatically generate a slug when saving the model
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });

        // Optionally, update the slug when updating the model
        static::updating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}