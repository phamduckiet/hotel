<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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
    Route::get('/bookings/{booking}', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});

Route::middleware(['auth', 'localization'])->group(function () {
    Route::get('/my-bookings', [BookingController::class, 'getBookingHistory'])->name('my_bookings.index');
    Route::get('/my-bookings/{booking}', [BookingController::class, 'getBookingDetail'])->name('my_bookings.show');


    Route::get('/update-language/{lang}', [
        UserController::class,
        'updateLanguage',
    ])->name('update-language');

    Route::get('/dashboard', [RoomTypeController::class, 'index']);

    Route::prefix('room-types')->group(function () {
        Route::get('/{room_type}/images', [RoomTypeController::class, 'showRoomImages']);
        Route::delete('/{room_type}/images/{imageId}', [RoomTypeController::class, 'deleteRoomImage']);
        Route::post('/{room_type}/images', [RoomTypeController::class, 'storeRoomImage']);
    });
    Route::resource('bookings', BookingController::class)->only(['index']);

    Route::resources([
        'room-types' => RoomTypeController::class,
        'rooms' => RoomController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'users' => UserController::class,
    ]);
});
