<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model
{       
     use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    use HasFactory;
}