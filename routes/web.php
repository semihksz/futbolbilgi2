<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\SeasonController;
use App\Http\Controllers\Backend\SquadController;
use App\Http\Controllers\Backend\TechnicalSquadController;
use App\Http\Controllers\FixturesController;

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

Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');
        Route::resource('sezon', SeasonController::class);
        Route::resource('takim-kadrosu', SquadController::class);
        Route::resource('teknik-kadro', TechnicalSquadController::class);
        Route::resource('fikstür', FixturesController::class);
    });
});
