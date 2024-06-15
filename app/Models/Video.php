<?php

namespace App\Models;

use Cohensive\OEmbed\Facades\OEmbed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title','url','category_id','description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getVideoAttribute($value)
{
    $embed = OEmbed::get($value);
    if($embed) {
        return $embed->html(['width'=>200]);
    }
}
}
