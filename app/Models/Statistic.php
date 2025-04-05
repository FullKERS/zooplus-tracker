<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
}