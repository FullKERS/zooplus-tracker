<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Session;

class CheckSessionSeedDMS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Pobierz ID sesji z sesji Laravel
        $sessionId = session('idSesji');

        if (!$sessionId) {
            return redirect('/login')->with('error', 'Sesja nie jest aktywna.');
        }

        // Sprawdź, czy sesja istnieje
        $session = Session::where('id', $sessionId)->first();

        if (!$session) {
            return redirect('/login')->with('error', 'Sesja wygasła.');
        }

        // Aktualizuj lastAccess
        $session->update(['lastAccess' => time()]);

        // Zapisz użytkownika w kontekście
        $request->merge(['authenticated_user' => $session->user]);

        return $next($request);
    }
}
