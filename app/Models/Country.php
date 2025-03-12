<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'iso_code', 'flag_image', 'estimated_delivery_days'];

    public function subcampaigns()
    {
        return $this->hasMany(Subcampaign::class);
    }
}