<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApartmentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

Route::resource('apartments', ApartmentController::class)->parameters(['apartments' => 'apartment:slug']);
});



require __DIR__ . '/auth.php';
