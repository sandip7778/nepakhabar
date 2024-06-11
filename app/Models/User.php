<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'path',
        'userType',
        'status',
    ];

    const ROLE_GUEST = 'guest';
    const ROLE_EDITOR = 'editor';
    const ROLE_REPORTER = 'reporter';
    const ROLE_ADMIN = 'admin';

    // Check if the user is an admin
    public function isAdmin()
    {
        return $this->userType === self::ROLE_ADMIN;
    }

    // Check if the user is an editor
    public function isEditor()
    {
        return $this->userType === self::ROLE_EDITOR;
    }

    // Check if the user is a reporter
    public function isReporter()
    {
        return $this->userType === self::ROLE_REPORTER;
    }

    // Check if the user is a guest
    public function isGuest()
    {
        return $this->userType === self::ROLE_GUEST;
    }





    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function react()
    {
        return $this->hasMany(React::class);
    }

}
