<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('localization')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/rooms/{room_type}/show', [HomeController::class, 'showRoomDetail'])->name('room.detail');
    Route::post('/rooms/{room_type}/booking', [BookingController::class, 'create'])->name('rooms.booking');
    Route::get('/booking', [BookingController::class, 'showBookingView'])->name('rooms.booking.view');
    Route::resource('bookings', BookingController::class)->only(['store']);
});

Route::middleware(['auth', 'localization'])->group(function () {
    Route::get('/update-language/{lang}', [
        UserController::class,
        'updateLanguage',
    ])->name('update-language');

    Route::get('/dashboard', [RoomTypeController::class, 'index']);

    Route::resource('room-types', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::prefix('rooms')->group(function () {
        Route::get('/{room}/images', [RoomController::class, 'showRoomImages']);
        Route::delete('/{room}/images/{imageId}', [RoomController::class, 'deleteRoomImage']);
        Route::post('/{room}/images', [RoomController::class, 'storeRoomImage']);
    });
    Route::resource('bookings', BookingController::class)->only(['index']);
});
