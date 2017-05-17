<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Gate;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'facebook_id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function generateAuthToken(Application $app)
    {
        $jwt = JWT::encode([
            'iss' => $app->key,
            'sub' => $this->email,
            'iat' => time(),
            'jti' => sha1($app->key.$this->email.time()),
        ], 'w5yuCV2mQDVTGmn3');

        return $jwt;
    }
}
















