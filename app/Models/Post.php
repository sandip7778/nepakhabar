<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','sub_title','slug','user_id','share','trending_status','youtube','image_desc', 'meta_tag','meta_keyword','path','status','context','description'];

    public static function boot()
    {
        parent::boot();

        // Automatically generate a slug when saving the model
        static::creating(function ($post) {
            $post->slug = $post->generateSlug();
        });

        // Optionally, update the slug when updating the model
        static::updating(function ($post) {
            $post->slug = $post->generateSlug();
        });
    }
    public function generateSlug()
    {
        return $this->id . '-' . Str::slug($this->title);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);

    }

    public function likes(){
        return $this->belongsToMany(User::class,'likes',)->withTimestamps();
    }

    public function getLinkAttribute()
    {
        $url = $this->youtube;
        if (!$url)
            return "";
        if (str_contains($url, 'youtube.com')) {
            $parts = explode('watch?v=', $url);
            $code = $parts[1];
            return 'https://www.youtube.com/embed/' . $code;
        }
    }
}
