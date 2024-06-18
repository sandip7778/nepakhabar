<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['name','url','position','ad_path','status','expiry_date'];
    protected $dates = ['expiry_date'];

    // Event handler for when model is retrieved
    protected static function booted()
    {
        static::retrieved(function ($advertisement) {
            // Check if advertisement has expired when retrieved
            if ($advertisement->hasExpired()) {
                $advertisement->expire();
            }
        });
    }

    // Check if the advertisement has expired
    public function hasExpired()
    {
        return Carbon::now()->greaterThanOrEqualTo($this->expiry_date);
    }

    // Expire the advertisement
    public function expire()
    {
        $this->update(['status' => false]);
    }
}
