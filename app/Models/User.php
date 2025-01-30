<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'address', 'is_admin'];
    protected $hidden = ['password'];
    public $timestamps = false;
}
