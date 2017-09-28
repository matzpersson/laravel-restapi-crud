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
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function statuses() {
        return $this->hasMany(Status::class);
    }
    
    public function jobs() {
        return $this->hasMany(Job::class, 'assignedto_id');
    }

    public function generateToken() {
        $this->api_token = md5(uniqid(''));
        $this->save();
        return $this->api_token;
    }
}