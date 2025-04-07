<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LocalUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'local_users';
    protected $fillable = ['name', 'email', 'password', 'is_admin'];
    protected $hidden = ['password'];
    protected $casts = ['is_admin' => 'boolean'];
}