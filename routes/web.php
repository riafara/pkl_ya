<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NIPController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLogController;

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

Route::get('/', [AuthController::class, 'redirect']);
Route::middleware(['guest'])->group(function () { 
    Route::controller(AuthController::class)->group(function () {
        Route::match(['get', 'post'], '/register', 'Register')->name('register');
        Route::match(['get', 'post'], '/login', 'Login')->name('login');
        Route::get('/checkpoint', 'CheckpointNIP')->name('checkpoint');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'Logout')->name('logout');
    });
    Route::prefix('dashboard')->group(function () { 
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
            Route::match(['get', 'post'], 'profile/{id}', 'profile')->name('profile');
        });
        Route::middleware(['role:administrator'])->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/user', 'index')->name('user.index');
                Route::get('/user/{id}/delete', 'delete')->name('user.delete');
                Route::match(['get', 'post'], '/user/create', 'store')->name('user.create');
                Route::match(['get', 'post'], '/user/{id}/update', 'update')->name('user.update');
            });
            Route::controller(UserLogController::class)->group(function () {
                Route::get('/user/log', 'index')->name('log.index');
                //in case want to add Create, Update, Delete
            });
            Route::controller(NIPController::class)->group(function () {
                Route::get('/nip', 'index')->name('nip.index');
                Route::get('/nip/{id}/delete', 'delete')->name('nip.delete');
                Route::match(['get', 'post'], '/nip/create', 'store')->name('nip.create');
                Route::match(['get', 'post'], '/nip/{id}/update', 'update')->name('nip.update');
                Route::post('/nip/csv', 'csv')->name('nip.csv');
            });
        });
    });
});