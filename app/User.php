<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// https://jwt-auth.readthedocs.io/en/develop/quick-start/

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier() {
		// return the primary key of the user - user id
		return $this->getKey();
	}

	public function getJWTCustomClaims() {
		// return a key value array, containing any custom claims to be added to JWT
		return [];
	}
}
