<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocalAuthController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\SubcampaignController;
use App\Http\Controllers\CalendarEntryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//wejscie z roota
Route::get('/', function () {
    if (auth()->check() || auth('web-local')->check()) {
        return redirect('/dashboard');
    }

    return redirect('/login');
});

//Logowanie SeedDMS
Route::get('/login/{idSesji}', [LoginController::class, 'loginWithSessionId']); //logowanie seeddms
Route::get('/login', [LocalAuthController::class, 'showLoginForm'])->name('local.login'); //logowanie - formularz
Route::post('/login', [LocalAuthController::class, 'login'])->name('local.login.submit'); //logowanie POST
/*Route::get('/login', function () {
    return redirect(env('SEEDDMS_URL'));
});*/

// Logowanie lokalne
/*Route::get('/local-login', [LocalAuthController::class, 'showLoginForm'])->name('local.login');
Route::post('/local-login', [LocalAuthController::class, 'login'])->name('local.login.submit');*/


//Dostep po zalogowaniu (zwyky)
Route::middleware(['check.auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::resource('calendar-entries', CalendarEntryController::class)->except(['show']);
    Route::get('/calendar-entries/by-date/{date}', [CalendarEntryController::class, 'getByDate'])->name('calendar-entries.by-date');
    Route::get('/calendar-upcoming', [CalendarEntryController::class, 'getUpcoming'])->name('calendar-entries.upcoming');
    Route::post('/change-password', [LocalAuthController::class, 'changePassword'])->name('password.change');
});

//Dostep admin
Route::middleware(['check.auth', 'is.admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::resource('local-users', 'App\\Http\\Controllers\\Admin\\LocalUserController');
    Route::resource('admins', 'App\Http\Controllers\Admin\AdminController')->except(['show', 'edit', 'update']);
    Route::resource('campaigns', 'App\\Http\\Controllers\\Admin\\CampaignController');
    //Route::resource('subcampaigns', 'App\\Http\\Controllers\\Admin\\SubcampaignController');
    //Route::get('subcampaigns/create/{campaign_id}', [SubcampaignController::class, 'create'])->name('admin.subcampaigns.create');
    Route::prefix('/campaigns/{campaign}')->group(function () {
        Route::get('/subcampaigns', [SubcampaignController::class, 'manage'])
            ->name('subcampaigns.manage');
            
        Route::post('/subcampaigns', [SubcampaignController::class, 'save'])
            ->name('subcampaigns.save');
    });
    Route::resource('countries', 'App\\Http\\Controllers\\Admin\\CountryController');
    Route::resource('statuses', 'App\Http\Controllers\Admin\StatusController');  
});
