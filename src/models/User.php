<?php

namespace App\Models;

use \App\Exceptions\EmailNotValidException;
use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];
    protected $hidden = ['password'];

    public function setFirstNameAttribute($firstName)
    {
        return $this->attributes['first_name'] = htmlspecialchars(strip_tags($firstName));
    }

    public function setLastNameAttribute($lastName)
    {
        return $this->attributes['last_name'] = htmlspecialchars(strip_tags($lastName));
    }

    public function setEmailAttribute($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailNotValidException();
        }
        return $this->attributes['email'] = htmlspecialchars(strip_tags($email));
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = password_hash($password, PASSWORD_BCRYPT);
    }

    public function quizes()
    {
        return $this->hasMany('\App\Models\Quiz');
    }
}
