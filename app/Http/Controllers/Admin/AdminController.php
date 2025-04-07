<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'type' => 'required|in:seeddms,local'
        ]);

        Admin::create($request->only('username', 'type'));
        
        return back()->with('success', 'Admin added successfully');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back()->with('success', 'Admin removed successfully');
    }
}