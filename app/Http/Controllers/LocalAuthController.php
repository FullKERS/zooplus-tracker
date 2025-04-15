<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::guard('web-local')->user();

    if (!$user || !Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
}
}