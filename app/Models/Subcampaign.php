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

    public function getStatusTxtAttribute(): string
    {
        // Pobranie statusu 'Distribution', jeśli istnieje
        $distributionStatus = $this->statuses()
            ->whereHas('status', function ($query) {
                $query->where('status_name', 'Distribution');
            })
            ->orderByDesc('status_date')
            ->first();

        // Jeśli status 'Distribution' istnieje i jego data jest w przeszłości, zwróć 'Completed'
        if ($distributionStatus && $distributionStatus->status_date <= now()) {
            return 'Completed';
        }

        return 'In progress';
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

        return round($progress, 2); // Zwracamy wynik zaokrąglony do 2 miejsc po przecinku
    }




    
}
