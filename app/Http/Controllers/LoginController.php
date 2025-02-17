<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class LoginController extends Controller
{
    public function loginWithSessionId($idSesji)
    {
        // Sprawdź, czy sesja istnieje
        $session = Session::where('id', $idSesji)->first();

        if (!$session) {
            // Pobierz adres SeedDMS z pliku .env
            $seedDmsUrl = env('SEEDDMS_URL', 'http://default-url-to-seeddms.com');

            // Przekieruj na adres SeedDMS
            return redirect($seedDmsUrl);
        }

        // Pobierz dane użytkownika
        $user = $session->user;

        if (!$user) {
            // Pobierz adres SeedDMS z pliku .env
            $seedDmsUrl = env('SEEDDMS_URL', 'http://default-url-to-seeddms.com');

            // Przekieruj na adres SeedDMS
            return redirect($seedDmsUrl);
        }

        // Zapisz `idSesji` w sesji Laravel
        session(['idSesji' => $idSesji]);

        // Przekieruj na dashboard
        return redirect('/dashboard')->with('success', 'Zalogowano pomyślnie.');
    }
}
