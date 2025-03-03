<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Subcampaign;
use App\Models\SubcampaignStatus;
use Carbon\Carbon;

class CampaignSeeder extends Seeder
{
    public function run()
    {
        $campaignNames = [
            'Calendar+coupons',
            'FSC Broszura A5 - PIES - 22 wersje',
            'FSC Broszura A5 - KOT - 22 wersje',
            'STR Selfmailer reaktywacyjny 210x297mm',
            'Broszura A5 - PIES - 22 wersje',
            'Broszura A5 - KOT - 22 wersje',
            'Selfmailer zooplus PL i CZ',
            'Ulotka zapachowa Febreze_TEST',
            'Selfmailer Reactivation - format 210x297mm',
            'Selfmailer Reactivation - format 230x297mm',
            'Selfmailer Reactivation - format 210x297mm',
        ];

        $countries = [179, 75, 57, 110, 68, 197, 166, 20];
        $statuses = [1, 2, 3, 7];

        foreach ($campaignNames as $campaignName) {
            $campaign = Campaign::create(['campaign_name' => $campaignName]);
            
            $subcampaignCount = rand(4, 5);
            for ($i = 0; $i < $subcampaignCount; $i++) {
                $startDate = Carbon::now()->subDays(rand(0, 60));
                $subcampaign = Subcampaign::create([
                    'subcampaign_name' => $campaignName . ' - Variant ' . ($i + 1),
                    'order_number' => rand(1200, 1299),
                    'quantity' => rand(5000, 20000),
                    'status' => 1,
                    'campaign_id' => $campaign->id,
                    'country_id' => $countries[array_rand($countries)],
                ]);
                
                $statusDate = clone $startDate;
                foreach ($statuses as $status) {
                    SubcampaignStatus::create([
                        'subcampaign_id' => $subcampaign->id,
                        'status_id' => $status,
                        'status_date' => $statusDate,
                        'is_visible' => true,
                        'is_assigned' => true,
                    ]);
                    $statusDate->addDays(rand(3, 7));
                }
            }
        }
    }
}
