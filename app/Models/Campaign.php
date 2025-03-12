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
        return Attribute::get(fn () => $this->subcampaigns->pluck('order_number')->unique()->implode(', '));
    }

    public function getSubcampaignsCountAttribute()
    {
        return $this->subcampaigns()->count();
    }

    public function getStatusTxtAttribute(): string
    {
        // Pobieranie wszystkich subkampanii
        $subcampaigns = $this->subcampaigns()->get();

        // Sprawdzanie, czy są jakieś subkampanie
        if ($subcampaigns->isEmpty()) {
            return 'In progress'; // Jeśli brak subkampanii, uznajemy, że jest w trakcie
        }

        // Liczba subkampanii z status 'Completed'
        $completedCount = $subcampaigns->filter(function ($subcampaigns) {
            return $subcampaigns->status_txt === 'Completed';
        })->count();

        // Jeśli liczba subkampanii 'Completed' jest równa liczbie wszystkich subkampanii, zwróć 'Completed'
        if ($completedCount === $subcampaigns->count()) {
            return 'Completed';
        }

        return 'In progress';
    }

    public function getCampaignProgressAttribute(): float
    {
        // Pobieramy wszystkie subkampanie
        $subcampaigns = $this->subcampaigns;

        // Suma quantity dla wszystkich subkampanii
        $totalQuantity = $subcampaigns->sum('quantity');

        // Suma postępów subkampanii ważona quantity
        $weightedProgress = $subcampaigns->reduce(function ($carry, $subcampaign) use ($totalQuantity) {
            // Obliczamy postęp subkampanii (z wykorzystaniem pola progress)
            $subkampaniaProgress = $subcampaign->progress;
            
            // Ważona wartość postępu dla subkampanii
            return $carry + ($subkampaniaProgress * ($subcampaign->quantity / $totalQuantity));
        }, 0);

        // Zwracamy postęp kampanii (w procentach)
        return round($weightedProgress, 0);
    }


    
}
