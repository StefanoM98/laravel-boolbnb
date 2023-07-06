<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Apartment Api Controller
Route::apiResource('apartments', ApartmentController::class);

// Sponsored Apartments Api Controller
Route::get('sponsored-apartments', [ApartmentController::class, 'sponsoredApartments'])->name('sponsored-apartments');

// Service Controller
Route::apiResource('services', ServiceController::class);

// Login Controller
Route::get('/login', [LoginController::class, 'login'])->name('api.login');