<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        // SeedDMS auth
        if ($this->checkSeedDmsAuth($request)) {
            /** @var \App\Models\User $user */
            $user = $request->authenticated_user;
            
            // Ustaw użytkownika w systemie Auth
            Auth::setUser($user);
            
            return $next($request);
        }

        // Local auth
        if (Auth::guard('web-local')->check()) {
            /** @var \App\Models\LocalUser $localUser */
            $localUser = Auth::guard('web-local')->user();
        
            // Skopiuj dane lokalnego użytkownika do obiektu klasy User
            $user = new \App\Models\User([
                'id' => $localUser->id,
                'login' => $localUser->login,
                'fullName' => $localUser->fullName,
                'email' => $localUser->email,
                'language' => $localUser->language,
                'theme' => $localUser->theme,
                'role' => $localUser->role,
                'hidden' => $localUser->hidden,
                'pwdExpiration' => $localUser->pwdExpiration,
                'disabled' => $localUser->disabled,
            ]);
            $user->setConnection('mysql'); // baza lokalna
            $user->exists = true;
        
            $request->merge(['authenticated_user' => $localUser]);
            Auth::setUser($localUser); // nadal działa Auth::user()
        
            return $next($request);
        }

        return redirect('/login');
    }

    private function checkSeedDmsAuth(Request $request)
    {
        $sessionId = session('idSesji');
        if (!$sessionId) return false;

        $session = \App\Models\Session::with('user')->find($sessionId);
        if (!$session || !$session->user) return false;

        // Zweryfikuj relację
        if (!method_exists($session->user, 'calendarEntries')) {
            throw new \RuntimeException('User model missing calendarEntries relationship');
        }

        $request->merge(['authenticated_user' => $session->user]);
        return true;
    }
}