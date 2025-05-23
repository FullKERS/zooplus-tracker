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

    /*public function statuses()
{
    return $this->hasMany(SubcampaignStatus::class, 'subcampaign_id')
                ->join('statuses', 'subcampaign_statuses.status_id', '=', 'statuses.id')
                ->orderBy('statuses.order')
                ->select('subcampaign_statuses.*'); // konieczne, żeby uniknąć konfliktów pól
}*/


    public function getStatusTxtAttribute(): string
    {
        // Jeśli subkampania ma ręcznie ustawiony status (np. paused, cancelled), traktuj jako 'In progress'
        if (!empty($this->status)) {
            return 'In progress';
        }

        // Pobranie statusu 'Estimated delivery time', jeśli istnieje
        $distributionStatus = $this->statuses()
            ->whereHas('status', function ($query) {
                $query->where('function_flag', 'DATA_NADANIA');
            })
            ->orderByDesc('status_date')
            ->first();

        // Jeśli status 'Estimated delivery time' istnieje i jego data jest w przeszłości, zwróć 'Completed'
        if ($distributionStatus && $distributionStatus->status_date && $distributionStatus->status_date <= now()) {
            return 'Completed';
        }

        // Pobranie ostatniego statusu (jeśli istnieje)
        $lastStatus = $this->statuses()
            ->where('status_date', '<=', now())
            ->orderByDesc('status_date')
            ->first();

        // Zwróć nazwę ostatniego statusu, jeśli istnieje, w przeciwnym razie 'In progress'
        return $lastStatus ? $lastStatus->status->status_name : 'In progress';
    }

    public function getProgressAttribute(): float
    {
        // Pobieramy wszystkie statusy subkampanii
        $statuses = $this->statuses;

        // Liczymy ile statusów jest zakończonych (status_date < teraz)
        $completedStatuses = $statuses->filter(function ($status) {
            return $status->status_date <= now();
        });

        // Obliczamy procent zakończonych statusów
        $progress = $statuses->count() > 0 ? ($completedStatuses->count() / $statuses->count()) * 100 : 0;

        return round($progress, 0); // Zwracamy wynik zaokrąglony do 2 miejsc po przecinku
    }





    
}
