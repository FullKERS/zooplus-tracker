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
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web-local')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web-local')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}