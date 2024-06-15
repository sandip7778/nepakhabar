<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','category_id','user_id','share', 'meta_tag','meta_keyword','path','status','description'];

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
}
