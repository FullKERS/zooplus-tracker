<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/login/{idSesji}', [LoginController::class, 'loginWithSessionId']);
Route::get('/test', function () {
    return 'Test działa!';
});

Route::middleware(['check.session.seedDMS'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/logout', [DashboardController::class, 'logout']);
});





//Route::resource('admin', 'App\\Http\\Controllers\\Admin\\CampaignController');
Route::resource('admin/campaigns', 'App\\Http\\Controllers\\Admin\\CampaignController');
Route::resource('admin/subcampaigns', 'App\\Http\\Controllers\\Admin\\SubcampaignController');
Route::get('admin/subcampaigns/create/{campaign_id}', [SubcampaignController::class, 'create'])->name('admin.subcampaigns.create');
Route::resource('admin/countries', 'App\\Http\\Controllers\\Admin\\CountryController');