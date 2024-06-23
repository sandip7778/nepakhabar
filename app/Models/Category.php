<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','header_status','footer_status','block'];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('updated_at','DESC');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
