<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Sprawdź autentykację SeedDMS
        if ($this->checkSeedDmsAuth($request)) {
            return $next($request);
        }

        // Sprawdź autentykację lokalną
        if (Auth::guard('web-local')->check()) {
            return $next($request);
        }

        return redirect('/login');
    }

    private function checkSeedDmsAuth(Request $request)
    {
        $sessionId = session('idSesji');
        if (!$sessionId) return false;

        $session = \App\Models\Session::find($sessionId);
        if (!$session || !$session->user) return false;

        $request->merge(['authenticated_user' => $session->user]);
        return true;
    }
}