<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocalAuthController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\SubcampaignController;

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

//Logowanie SeedDMS
Route::get('/login/{idSesji}', [LoginController::class, 'loginWithSessionId']);
Route::get('/login', function () {
    return redirect(env('SEEDDMS_URL'));
});

// Logowanie lokalne
Route::get('/local-login', [LocalAuthController::class, 'showLoginForm'])->name('local.login');
Route::post('/local-login', [LocalAuthController::class, 'login'])->name('local.login.submit');


//Dostep po zalogowaniu (zwyky)
Route::middleware(['check.auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/logout', [DashboardController::class, 'logout']);
});

//Dostep admin
Route::middleware(['check.auth', 'is.admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::resource('local-users', 'App\\Http\\Controllers\\Admin\\LocalUserController');
    Route::resource('admins', 'App\Http\Controllers\Admin\AdminController')->except(['show', 'edit', 'update']);
    Route::resource('campaigns', 'App\\Http\\Controllers\\Admin\\CampaignController');
    Route::resource('subcampaigns', 'App\\Http\\Controllers\\Admin\\SubcampaignController');
    Route::get('subcampaigns/create/{campaign_id}', [SubcampaignController::class, 'create'])->name('admin.subcampaigns.create');
    Route::resource('countries', 'App\\Http\\Controllers\\Admin\\CountryController');
    Route::resource('statuses', 'App\Http\Controllers\Admin\StatusController');  
});
