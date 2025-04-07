<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $username = $this->getAuthenticatedUsername();

        if (!$username || !Admin::where('username', $username)->exists()) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }

    private function getAuthenticatedUsername()
    {
        // Dla użytkowników SeedDMS
        if ($seedDmsUser = request()->get('authenticated_user')) {
            return $seedDmsUser->login;
        }

        // Dla użytkowników lokalnych
        if (Auth::guard('web-local')->check()) {
            return Auth::guard('web-local')->user()->email;
        }

        return null;
    }
}