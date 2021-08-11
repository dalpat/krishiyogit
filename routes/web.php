<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Farmer\DashboardController as FarmerDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for admin
Route::group([
    'middleware'=>['auth','admin'],
    'prefix'=>'admin'
], function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('admin.dashboard.index');
});


// Routes for farmers
Route::group([
    'middleware'=>['auth','farmer'],
    'prefix'=>'farmer',
], function () {
    Route::get('dashboard', [FarmerDashboardController::class,'index'])->name('farmer.dashboard.index');
});



// Routes for vendors
