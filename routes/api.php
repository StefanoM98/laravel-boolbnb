<?php

use App\Http\Controllers\Api\ApartmentController;
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

// Apartment Api Controller
Route::get('sponsored-apartments', [ApartmentController::class, 'sponsoredApartments'])->name('sponsored-apartments');