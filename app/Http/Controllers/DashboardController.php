<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Campaign;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->get('authenticated_user');

        $campaignes = Campaign::where('is_visible', true)
            ->with(['subcampaigns.statuses.status'])
            ->get();

        $stats = [
            'projects_total' => Statistic::projectsTotal(),
            'open_projects' => Statistic::openProjects(),
            'completed_projects' => Statistic::completedProjects(),
            'total_quantity' => Statistic::totalQuantityShipped()
        ];

        $campaignes->each(function ($campaign) {
            $campaign->subcampaigns->each(function ($subcampaign) {
                $subcampaign->statuses = $subcampaign->statuses->sortBy(function ($subStatus) {
                    return $subStatus->status->order ?? PHP_INT_MAX;
                })->values(); // resetuj klucze, żeby były od zera
            });
        });


        // Podział na aktywne/zakończone
        $activeCampaigns = $campaignes->filter(function ($campaign) {
            return $campaign->subcampaigns->contains(function ($subcampaign) {
                return
                    // Jeśli ma ustawiony status (np. "paused", "cancelled")
                    !empty($subcampaign->status)
                    ||
                    // Albo jeśli istnieje status DORECZENIE z datą w przyszłości
                    $subcampaign->statuses->contains(function ($status) {
                        return $status->status->function_flag === 'DORECZENIE'
                            && Carbon::parse($status->status_date)->isFuture();
                    });
            });
        })->sortBy(function ($campaign) {
            return $campaign->getEarliestEstimatedDelivery();
        });

        $completedCampaigns = $campaignes->reject(function ($campaign) use ($activeCampaigns) {
            return $activeCampaigns->contains($campaign);
        })->sortByDesc(function ($campaign) {
            return $campaign->getEarliestEstimatedDelivery();
        });

        return view('dashboard', compact('user', 'activeCampaigns', 'completedCampaigns', 'stats'));
    }


    public function logout(Request $request)
    {
        // Usuń idSesji, jeśli istnieje
        $isSeedUser = session()->has('idSesji');

        session()->forget('idSesji');

        if (Auth::guard('web-local')->check()) {
            Auth::guard('web-local')->logout();
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Jeżeli był to użytkownik SeedDMS, przekieruj na logout SeedDMS
        if ($isSeedUser) {
            $logoutUrl = config('app.seeddms_url') . config('app.seeddms_url_additional') . 'op/op.Logout.php';
            return redirect($logoutUrl);
        }

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
