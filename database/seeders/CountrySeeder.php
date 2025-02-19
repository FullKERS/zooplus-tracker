<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use Rinvex\Country\Country as RinvexCountry;

class CountrySeeder extends Seeder
{
    public function run()
    {
        // Pobieranie wszystkich krajów
        $countries = countries(); // Zwraca tablicę krajów

        // Iteracja przez wszystkie kraje
        foreach ($countries as $country) {
            // Tworzenie nowego rekordu w tabeli 'countries' przy użyciu klasy App\Models\Country
            Country::create([
                'name' => $country['name'], // Zmienione na 'name'
                'iso_code' => $country['iso_3166_1_alpha2'], // Zmienione na 'iso_3166_1_alpha2'
                'flag_image' => $this->saveFlagImage($country['emoji']), // Zmienione na 'emoji', bo flagi są w emoji
            ]);
        }
    }

    /**
     * Funkcja zapisująca flagę lokalnie
     */
    private function saveFlagImage($flagEmoji)
    {
        // Zapiszemy emoji jako obrazek, jednak w tej metodzie musisz znaleźć sposób,
        // aby konwertować emoji na obrazek (co może wymagać dodatkowego rozwiązania).
        // Na razie zapiszę flagę jako tekst (emoji).

        return $flagEmoji; // Zwracamy emoji
    }
}
