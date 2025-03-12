<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UpdateCountriesEstimatedDeliveryDaysSeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->update(['estimated_delivery_days' => 2]);
    }
}