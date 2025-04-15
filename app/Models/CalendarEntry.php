<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEntry extends Model
{
    protected $connection = 'mysql';
    protected $table = 'calendar_entries';
    protected $fillable = [
        'date',
        'title',
        'description',
        'user_id',
        'user_type'
    ];

    public function user()
    {
        return $this->morphTo();
    }
}
