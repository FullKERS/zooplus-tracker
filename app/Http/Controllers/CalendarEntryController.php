<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CalendarEntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.auth');
    }

    private function getAuthenticatedUser()
    {
        // 1. Sprawdź autentykację SeedDMS
        if ($user = request()->authenticated_user) {
            return $user;
        }

        // 2. Sprawdź lokalną autentykację
        if ($user = Auth::guard('web-local')->user()) {
            return $user;
        }

        abort(401, 'Nieautoryzowany dostęp');
    }

    public function index()
    {
        // Wszystkie wpisy bez ograniczenia daty
        $entries = CalendarEntry::orderBy('date')->get();

        return response()->json($entries);
    }


    public function getUpcoming()
    {
        $entries = CalendarEntry::where('date', '>=', Carbon::now()->toDateString())
            ->orderBy('date')
            ->take(10)
            ->get();

        return response()->json($entries);
    }


    public function getByDate($date)
    {
        $user = $this->getAuthenticatedUser();

        $entries = $user->calendarEntries()
            ->whereDate('date', $date)
            ->get();

        return response()->json($entries);
    }

    public function store(Request $request)
    {
        $user = $this->getAuthenticatedUser();

        $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $entry = CalendarEntry::create([
            'date' => $request->date,
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user->id,
            'user_type' => get_class($user), // App\Models\User lub App\Models\LocalUser
        ]);

        return response()->json($entry, 201);
    }

    public function destroy(CalendarEntry $calendarEntry)
    {
        $user = $this->getAuthenticatedUser();

        if ($calendarEntry->user_id !== $user->id) {
            abort(403, 'Brak uprawnień do usunięcia wpisu');
        }

        $calendarEntry->delete();
        return response()->json(['success' => true]);
    }
}
