<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class users extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'username';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'username', 'name', 'email', 'password', 'nohp', 'status', 'alamat', 'kota'
    ];
}
