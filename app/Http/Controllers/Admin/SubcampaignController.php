<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Campaign, Subcampaign, Country, Status, SubcampaignStatus};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcampaignController extends Controller
{
    public function manage(Campaign $campaign)
    {
        $campaign->load(['subcampaigns.statuses.status']);
        $countries = Country::all();
        $statuses = Status::orderBy('order', 'asc')->get();

        return view('adminSubcampaigns.subcampaigns.menage', compact(
            'campaign',
            'countries',
            'statuses'
        ));
    }

    public function save(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'subcampaigns' => 'required|array',
            'subcampaigns.*.id' => 'nullable|exists:subcampaigns,id,campaign_id,'.$campaign->id,
            'subcampaigns.*.subcampaign_name' => 'required|string|max:255',
            'subcampaigns.*.country_id' => 'required|exists:countries,id',
            'subcampaigns.*.order_number' => 'nullable|string|max:255',
            'subcampaigns.*.quantity' => 'nullable|integer|min:0',
            'subcampaigns.*.statuses' => 'required|array',
            'subcampaigns.*.statuses.*.id' => [
                'nullable',
                function ($attribute, $value, $fail) use ($campaign) {
                    if ($value && !SubcampaignStatus::where('id', $value)
                        ->whereHas('subcampaign', fn($q) => $q->where('campaign_id', $campaign->id))
                        ->exists()) {
                        $fail('Nieprawidłowy status dla podkampanii');
                    }
                },
            ],
            'subcampaigns.*.statuses.*.status_id' => 'required|exists:statuses,id',
            'subcampaigns.*.statuses.*.status_date' => 'nullable|date',
            'deleted_subcampaigns' => 'sometimes|array',
            'deleted_subcampaigns.*' => 'exists:subcampaigns,id,campaign_id,'.$campaign->id
        ]);

        return DB::transaction(function () use ($campaign, $validated) {
            // Usuń oznaczone do usunięcia
            if (!empty($validated['deleted_subcampaigns'])) {
                Subcampaign::whereIn('id', $validated['deleted_subcampaigns'])->delete();
            }

            foreach ($validated['subcampaigns'] as $subcampaignData) {
                $subcampaign = $this->updateOrCreateSubcampaign($campaign, $subcampaignData);
                $this->syncStatuses($subcampaign, $subcampaignData['statuses']);
            }

            return redirect()->back()->with('success', 'Zmiany zostały zapisane');
        });
    }

    private function updateOrCreateSubcampaign(Campaign $campaign, array $data): Subcampaign
    {
        return Subcampaign::updateOrCreate(
            ['id' => $data['id'] ?? null],
            [
                'campaign_id' => $campaign->id,
                'subcampaign_name' => $data['subcampaign_name'],
                'country_id' => $data['country_id'],
                'order_number' => $data['order_number'],
                'quantity' => $data['quantity']
            ]
        );
    }

    private function syncStatuses(Subcampaign $subcampaign, array $statuses): void
    {
        $existingStatusIds = [];
        
        foreach ($statuses as $statusData) {
            $status = $subcampaign->statuses()->updateOrCreate(
                ['id' => $statusData['id'] ?? null], // Szukaj po ID jeśli istnieje
                [
                    'status_id' => $statusData['status_id'],
                    'status_date' => $statusData['status_date'],
                    'is_visible' => $statusData['is_visible'] ?? false,
                    'is_assigned' => $statusData['is_assigned'] ?? false
                ]
            );
            
            $existingStatusIds[] = $status->id;
        }

        $subcampaign->statuses()
            ->whereNotIn('id', $existingStatusIds)
            ->delete();
    }
}