<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content','post_id','user_id','parent_id'];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Define the relationship to child comments (replies)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function reply()
    {
        return $this->hasOne(Comment::class, 'parent_id')->orderBy('updated_at', 'DESC');
    }
}
