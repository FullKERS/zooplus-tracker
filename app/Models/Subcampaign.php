<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcampaign extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subcampaigns';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['subcampaign_name', 'order_number', 'quantity', 'status', 'campaign_id', 'country_id'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function statuses()
    {
        return $this->hasMany(SubcampaignStatus::class, 'subcampaign_id');
    }



    
}
