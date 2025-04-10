<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Campaign;
use App\Models\Statistic;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        $user = $request->get('authenticated_user');
        
        $campaignes = Campaign::with(['subcampaigns.statuses.status'])->get();

        $stats = [
            'projects_total' => Statistic::projectsTotal(),
            'open_projects' => Statistic::openProjects(),
            'completed_projects' => Statistic::completedProjects(),
            'total_quantity' => Statistic::totalQuantityShipped()
        ];
    

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

        return view('dashboard', compact('user', 'activeCampaigns', 'completedCampaigns', 'stats'));
    }

    public function logout(Request $request)
    {
        session()->forget('idSesji');
        return redirect('/login')->with('success', 'Wylogowano pomyślnie.');
    }
}
