<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LocalUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'local_users';

    protected $fillable = [
        'login',
        'fullName',
        'email',
        'language',
        'theme',
        'role',
        'hidden',
        'pwdExpiration',
        'disabled',
        'password',
    ];

    protected $hidden = ['password'];
    protected $casts = [
        'pwdExpiration' => 'datetime',
        'disabled' => 'boolean',
        'hidden' => 'boolean',
    ];

    public function calendarEntries()
    {
        return $this->morphMany(CalendarEntry::class, 'user');
    }
}
