<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Subcampaign;
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
    
        return view('adminSubcampaigns.subcampaigns.create', compact('campaign_id', 'campaign'));
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

        return view('adminSubcampaigns.subcampaigns.edit', compact('subcampaign'));
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

        return redirect('admin/subcampaigns')->with('flash_message', 'Subcampaign updated!');
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
        Subcampaign::destroy($id);

        return redirect('admin/subcampaigns')->with('flash_message', 'Subcampaign deleted!');
    }
}