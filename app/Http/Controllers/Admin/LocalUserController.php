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
            'login' => 'required|string|unique:local_users,login',
            'fullName' => 'required|string',
            'email' => 'required|email|unique:local_users,email',
            'password' => 'required|min:8',
            'language' => 'nullable|string|max:16',
            'theme' => 'nullable|string|max:32',
            'role' => 'required|in:user,admin',
            'hidden' => 'sometimes|boolean',
            'disabled' => 'sometimes|boolean',
            'pwdExpiration' => 'nullable|date'
        ]);

        LocalUser::create([
            'login' => $request->login,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'language' => $request->language,
            'theme' => $request->theme,
            'role' => $request->role,
            'hidden' => $request->has('hidden'),
            'disabled' => $request->has('disabled'),
            'pwdExpiration' => $request->pwdExpiration,
        ]);

        return redirect()->route('admin.local-users.index')->with('success', 'Użytkownik został dodany.');
    }

    public function edit(LocalUser $localUser)
    {
        return view('admin.local-users.edit', compact('localUser'));
    }

    public function update(Request $request, LocalUser $localUser)
    {
        $request->validate([
            'login' => 'required|string|unique:local_users,login,' . $localUser->id,
            'fullName' => 'required|string',
            'email' => 'required|email|unique:local_users,email,' . $localUser->id,
            'password' => 'nullable|min:8',
            'language' => 'nullable|string|max:16',
            'theme' => 'nullable|string|max:32',
            'role' => 'required|in:user,admin',
            'hidden' => 'sometimes|boolean',
            'disabled' => 'sometimes|boolean',
            'pwdExpiration' => 'nullable|date'
        ]);

        $data = $request->only([
            'login',
            'fullName',
            'email',
            'language',
            'theme',
            'role',
            'hidden',
            'disabled',
            'pwdExpiration'
        ]);

        $data['hidden'] = $request->has('hidden');
        $data['disabled'] = $request->has('disabled');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $localUser->update($data);

        return redirect()->route('admin.local-users.index')->with('success', 'Dane użytkownika zostały zaktualizowane.');
    }

    public function destroy(LocalUser $localUser)
    {
        $localUser->delete();
        return redirect()->route('admin.local-users.index')->with('success', 'Użytkownik został usunięty.');
    }
}
