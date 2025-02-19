<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class ClearCountriesSeeder extends Seeder
{
    public function run()
    {
        // Usunięcie wszystkich danych z tabeli 'countries'
        Country::truncate();
    }
}