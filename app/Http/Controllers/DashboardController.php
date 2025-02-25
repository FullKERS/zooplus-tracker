<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Campaign;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->get('authenticated_user');
        $campaignes = Campaign::all();
        return view('dashboard', compact('user', 'campaignes'));
    }

    public function logout(Request $request)
    {
        session()->forget('idSesji');
        return redirect('/login')->with('success', 'Wylogowano pomyślnie.');
    }
}
