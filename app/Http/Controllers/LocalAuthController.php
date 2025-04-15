<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalUser;
use Illuminate\Support\Facades\Auth;

class LocalAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.local-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::guard('web-local')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['login' => 'Invalid login credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web-local')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}