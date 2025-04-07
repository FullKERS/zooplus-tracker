<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocalUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LocalUserController extends Controller
{
    public function index()
    {
        $users = LocalUser::all();
        return view('admin.local-users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.local-users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:local_users',
            'password' => 'required|min:8',
            'is_admin' => 'sometimes|boolean'
        ]);

        LocalUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin')
        ]);

        return redirect()->route('admin.local-users.index');
    }
}