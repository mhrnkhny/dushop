<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class  User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = 'users';
    protected $connection='mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'email', 'password', 'role', 'national_code', 'lastName', 'image'
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

    public function admin()
    {
        return $this->role == 'admin' ? true : false;
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function phone()
    {
        return $this->hasMany(Phone::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }


}
