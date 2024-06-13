<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['siteName', 'address', 'email', 'phone', 'facebook', 'instagram', 'twitter', 'youtube', 'thread', 'metaTitle', 'metaTag', 'metaKeyword', 'metaDescription'];
}
