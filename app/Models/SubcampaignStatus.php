<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubcampaignStatus extends Model
{
    protected $table = 'subcampaign_statuses';

    protected $fillable = [
        'subcampaign_id',
        'status_id',
        'status_date',
        'is_visible',
        'is_assigned'
    ];

    public function subcampaign(): BelongsTo
    {
        return $this->belongsTo(Subcampaign::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
