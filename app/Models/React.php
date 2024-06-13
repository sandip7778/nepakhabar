<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    use HasFactory;

    protected $fillable = ['content','post_id','user_id','like','share','parent_id'];
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
        return $this->belongsTo(React::class, 'parent_id');
    }

    // Define the relationship to child comments (replies)
    public function replies()
    {
        return $this->hasMany(React::class, 'parent_id');
    }
}
