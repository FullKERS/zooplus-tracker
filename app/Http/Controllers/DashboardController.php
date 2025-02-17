<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->get('authenticated_user');
        return view('dashboard', compact('user'));
    }

    public function logout(Request $request)
    {
        session()->forget('idSesji');
        return redirect('/login')->with('success', 'Wylogowano pomyślnie.');
    }
}
