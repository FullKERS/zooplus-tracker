<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;


    protected $connection = 'seeddms';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblSessions';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'userID',
        'lastAccess',
        'theme',
        'language',
        'clipboard',
        'su',
        'splashmsg',
    ];

    /**
     * Define the relationship to the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
}
