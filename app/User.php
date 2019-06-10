<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public $hidden = [
        'api_token',
        'api_token',
        'email_verified_at',
        'password',
        'auth_token',
        'created_at',
        'updated_at',
        'remember_token',
        'id',
    ];

    use HasApiTokens, Notifiable;
}