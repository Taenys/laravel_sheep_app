<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function part(){

        return $this->hasOne(Part::class);
    }

    public function balance(){

        return $this->hasOne(Balance::class);
    }

    public function trip(){

        return $this->hasOne(Trip::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function spendings(){
        return $this->belongsToMany(Spending::class);
    }

    public function picture(){
        return $this->hasOne(Picture::class);
    }
}
