<?php

use App\Http\Controllers\Admin\CropController as AdminCropController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Farmer\CropController;
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
    // return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for admin
Route::group([
    'middleware'=>['auth','admin'],
    'prefix'=>'admin',
    'as'=>'admin.'
], function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('crops', AdminCropController::class)->only(['index','update']);

    Route::resource('news', NewsController::class);
});


// Routes for farmers
Route::group([
    'middleware'=>['auth','farmer'],
    'prefix'=>'farmer',
    'as'=>'farmer.',
], function () {
    Route::get('dashboard', [FarmerDashboardController::class,'index'])->name('dashboard.index');
    Route::resource('crops', CropController::class);
});



// Routes for vendors
