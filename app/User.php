<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use AuthenticableTrait;
    use Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    protected $table = 'users';
     
    protected $fillable = [
        'name', 'email', 'user_status', 'password','usable_id', 'usable_type', 
    ];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function usable()
    {
        return $this->morphTo();
    }
}
