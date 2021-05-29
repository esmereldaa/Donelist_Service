<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    public $timestamps = false;
    public $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'token',
        'uname',
        'password',
        'email',
    ];
    protected $hidden = [
        'password',
    ];
}
