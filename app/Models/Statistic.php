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
        return Campaign::has('subcampaigns')->count();
    }

    /**
     * Liczba aktywnych kampanii (z przynajmniej jedną subkampanią In progress)
     */
    public static function openProjects(): int
    {
        return Campaign::with('subcampaigns')
            ->get()
            ->filter(function ($campaign) {
                return $campaign->subcampaigns->isNotEmpty() &&
                    $campaign->subcampaigns->contains(function ($sub) {
                        return $sub->status_txt !== 'Completed';
                    });
            })->count();
    }

    /**
     * Liczba zakończonych kampanii (wszystkie subkampanie Completed)
     */
    public static function completedProjects(): int
    {
        return Campaign::with('subcampaigns')
            ->get()
            ->filter(function ($campaign) {
                return $campaign->subcampaigns->isNotEmpty() &&
                    $campaign->subcampaigns->every(function ($sub) {
                        return $sub->status_txt === 'Completed';
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
                $q->where('function_flag', 'DATA_NADANIA')
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
        ->where('statuses.function_flag', 'DATA_NADANIA')
        ->where('subcampaign_statuses.status_date', '<', now())
        ->whereNull('subcampaigns.status')
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