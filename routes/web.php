<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Login;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/logout', [LoginController::class, 'logout']);

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('ice_cream', IceCreamController::class)->parameter('ice_cream', 'id');
    // Route::get('/', [DashboardController::class, 'index']);
    // Route::resource('/food', FoodController::class);
    // Route::resource('/drink', DrinkController::class);
});
