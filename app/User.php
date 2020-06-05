<?php

namespace App;

// use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
=======
>>>>>>> 105331cc5305c0b4b4b0d96e51eb59250e1c6c94

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
<<<<<<< HEAD
    use Notifiable;
=======
>>>>>>> 105331cc5305c0b4b4b0d96e51eb59250e1c6c94

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
