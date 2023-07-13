<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MessageController;
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
Route::apiResource('apartments', ApartmentController::class)->only('index', 'show');

// Sponsored Apartments Api Controller
Route::get('sponsored-apartments', [ApartmentController::class, 'sponsoredApartments'])->name('sponsored-apartments');

// Service Controller
Route::apiResource('services', ServiceController::class)->only('index');

// Message Controller
Route::post('messages', [MessageController::class, 'store']);

// Login Controller
Route::get('/login', [LoginController::class, 'login'])->name('api.login');