<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Subcampaign;
use App\Models\Campaign;
use App\Models\Country;
use Illuminate\Http\Request;

class SubcampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $subcampaigns = Subcampaign::where('subcampaign_name', 'LIKE', "%$keyword%")
                ->orWhere('order_number', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('campaign_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $subcampaigns = Subcampaign::latest()->paginate($perPage);
        }

        return view('adminSubcampaigns.subcampaigns.index', compact('subcampaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($campaign_id)
    {
        $campaign = \App\Models\Campaign::find($campaign_id);
        $countries = Country::all();  // Pobranie wszystkich krajów
    
        return view('adminSubcampaigns.subcampaigns.create', compact('campaign_id', 'campaign', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        /*
        $requestData = $request->all();
        
        Subcampaign::create($requestData);

        return redirect()->route('admin.campaigns.show', $request->campaign_id)->with('flash_message', 'Subcampaign added!');*/
        
            // Pobieramy wszystkie dane subkampanii
            $subcampaigns = $request->input('subcampaigns');

            // Walidacja danych (opcjonalnie)
            $validated = $request->validate([
                'subcampaigns.*.subcampaign_name' => 'required|string',
                //'subcampaigns.*.order_number' => 'required|string',
                //'subcampaigns.*.quantity' => 'required|integer',
                //'subcampaigns.*.status' => 'required|string',
            ]);
        
            foreach ($subcampaigns as $subcampaignData) {
                $subcampaignData['campaign_id'] = $request->campaign_id; // Ustawienie campaign_id

                // Tworzenie subkampanii
                Subcampaign::create($subcampaignData);
            }
        
            // Przekierowanie na stronę kampanii z przekazanym campaign_id
            return redirect()->to('/admin/campaigns/'.$request->campaign_id)->with('flash_message', 'Subcampaigns added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subcampaign = Subcampaign::findOrFail($id);

        return view('adminSubcampaigns.subcampaigns.show', compact('subcampaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subcampaign = Subcampaign::findOrFail($id);
        $countries = Country::all();  // Pobranie wszystkich krajów
        $campaigns = Campaign::all();

        return view('adminSubcampaigns.subcampaigns.edit', compact('subcampaign', 'countries', 'campaigns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $subcampaign = Subcampaign::findOrFail($id);
        $subcampaign->update($requestData);

        return redirect('admin/campaigns/'.$subcampaign->campaign->id)->with('flash_message', 'Subcampaign updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $subcampaign = Subcampaign::findOrFail($id);
        
        $campaignId = $subcampaign->campaign_id;

        $subcampaign->delete();

        return redirect('admin/campaigns/'.$subcampaign->campaign->id)->with('flash_message', 'Subcampaign deleted!');
    }
}