<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Vizir\KeycloakWebGuard\Models\KeycloakUser;

class User extends KeycloakUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


   /*
    this class is used for overriding the KeyCloak user one. Its purpose is to fetch extra info received from keycloak

    The following can be set as fillable:
    "sub" => "55a52f7d-672f-49ba-9d7f-7537962f79c5"
    "email_verified" => false
    "name" => "firstname lastname"
    "preferred_username" => "username"
    "given_name" => "firstname"
    "family_name" => "lastname"
    "email" => "username@mail.com"
    */

    protected $fillable = [
        'name', 'email', 'sub',"preferred_username", "given_name", "family_name","email"
    ];

     /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->attributes['sub'];
    }

}
