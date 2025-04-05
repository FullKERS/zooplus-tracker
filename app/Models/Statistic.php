<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{
    /**
     * Liczba wszystkich subkampanii
     */
    public static function projectsTotal(): int
    {
        return Subcampaign::count();
    }

    /**
     * Liczba aktywnych subkampanii (Estimated delivery time w przyszłości)
     */
    public static function openProjects(): int
    {
        return Subcampaign::whereHas('statuses', function($query) {
            $query->whereHas('status', function($q) {
                $q->where('status_name', 'Estimated delivery time')
                  ->whereDate('status_date', '>', Carbon::now());
            });
        })->count();
    }

    /**
     * Liczba zakończonych subkampanii (Estimated delivery time w przeszłości)
     */
    public static function completedProjects(): int
    {
        return Subcampaign::whereHas('statuses', function($query) {
            $query->whereHas('status', function($q) {
                $q->where('status_name', 'Estimated delivery time')
                  ->whereDate('status_date', '<=', Carbon::now());
            });
        })->count();
    }

    /**
     * Łączna ilość wysłanych produktów
     */
    public static function totalQuantityShipped(): int
    {
        return Subcampaign::whereHas('statuses', function($query) {
            $query->whereHas('status', function($q) {
                $q->where('status_name', 'Shipment dispatch')
                  ->whereDate('status_date', '<=', Carbon::now());
            });
        })->sum('quantity');
    }

    public static function countriesQuantities()
    {
        return Country::select([
            'countries.iso_code',
            'countries.name',
            'countries.flag_image',
            DB::raw('SUM(subcampaigns.quantity) as total_quantity')
        ])
        ->join('subcampaigns', 'countries.id', '=', 'subcampaigns.country_id')
        ->join('subcampaign_statuses', 'subcampaigns.id', '=', 'subcampaign_statuses.subcampaign_id')
        ->join('statuses', 'subcampaign_statuses.status_id', '=', 'statuses.id')
        ->where('statuses.status_name', 'Shipment dispatch')
        ->where('subcampaign_statuses.status_date', '<', now())
        ->groupBy(
            'countries.id',
            'countries.iso_code',  
            'countries.name',       
            'countries.flag_image' 
        )
        ->orderByDesc('total_quantity')
        ->get()
        ->map(function($country, $index) {
            return [
                'lp' => $index + 1,
                'iso_code' => $country->iso_code,
                'name' => $country->name,
                'flag' => $country->flag_image,
                'total_quantity' => $country->total_quantity
            ];
        });
    }
}