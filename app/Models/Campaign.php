<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

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
    protected $fillable = ['campaign_name', 'is_visible'];



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

        // Jeśli którakolwiek subkampania ma ustawiony status (np. paused, cancelled), to kampania jest w trakcie
        if ($subcampaigns->contains(function ($sub) {
            return !empty($sub->status);
        })) {
            return 'In progress';
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


    public function getDateAdmission(): ?DateTime
    {
        $date = SubcampaignStatus::whereHas('subcampaign', function ($query) {
                $query->where('campaign_id', $this->id);
            })
            ->whereHas('status', function ($query) {
                $query->where('function_flag', 'OTRZYMANIE_ZAMOWIENIA');
            })
            ->min('status_date');

        return $date ? new DateTime($date) : null;
    }

    public function getEndDate(): ?DateTime
    {
        $date = SubcampaignStatus::whereHas('subcampaign', function ($query) {
                $query->where('campaign_id', $this->id);
            })
            ->whereHas('status', function ($query) {
                $query->where('function_flag', 'DATA_NADANIA');
            })
            ->max('status_date');

        return $date ? new DateTime($date) : null;
    }

    public function getEarliestEstimatedDelivery()
    {
        $dates = $this->subcampaigns->flatMap(function($subcampaign) {
            return $subcampaign->statuses
                ->where('status.function_flag', 'DORECZENIE')
                ->pluck('status_date');
        })->sort();

        return $dates->first() ? Carbon::parse($dates->first()) : now()->addYears(10);
    }


    
}