<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Campaign;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        $user = $request->get('authenticated_user');
        
        $campaignes = Campaign::with(['subcampaigns.statuses.status'])->get();

        // Podział na aktywne/zakończone
        $activeCampaigns = $campaignes->filter(function($campaign) {
            return $campaign->subcampaigns->contains(function($subcampaign) {
                return $subcampaign->statuses->contains(function($status) {
                    return $status->status->status_name === 'Estimated delivery time' 
                        && Carbon::parse($status->status_date)->isFuture();
                });
            });
        })->sortBy(function($campaign) {
            return $campaign->getEarliestEstimatedDelivery();
        });

        $completedCampaigns = $campaignes->reject(function($campaign) use ($activeCampaigns) {
            return $activeCampaigns->contains($campaign);
        })->sortByDesc(function($campaign) {
            return $campaign->getEarliestEstimatedDelivery();
        });

        return view('dashboard', compact('user', 'activeCampaigns', 'completedCampaigns'));
    }

    public function logout(Request $request)
    {
        session()->forget('idSesji');
        return redirect('/login')->with('success', 'Wylogowano pomyślnie.');
    }
}
