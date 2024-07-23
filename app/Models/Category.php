<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','position','header_status','footer_status','block'];

    public function posts()
    {
        return $this->belongsToMany(Post::class)->orderBy('updated_at','DESC');
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class)->orderBy('updated_at','DESC');
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
