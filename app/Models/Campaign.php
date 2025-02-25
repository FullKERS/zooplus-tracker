<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Campaign extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campaigns';

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
    protected $fillable = ['campaign_name'];

    public function subcampaigns()
    {
        return $this->hasMany(Subcampaign::class);
    }


    public function orderNumbers(): Attribute
    {
        return Attribute::get(fn () => $this->subcampaigns->pluck('order_number')->implode(', '));
    }

    public function getSubcampaignsCountAttribute()
    {
        return $this->subcampaigns()->count();
    }

    
}
