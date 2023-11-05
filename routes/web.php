<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RatingController;
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
Route::get('payment-success', [BookingController::class, 'paymentSuccess']);
Route::get('payment-error', [BookingController::class, 'paymentError']);
Route::get('/about', [HomeController::class, 'about'])->name('about.view');
Route::middleware('localization')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/rooms/{room_type}/show', [HomeController::class, 'showRoomDetail'])->name('room.detail');
    Route::post('/rooms/{room_type}/booking', [BookingController::class, 'create'])->name('rooms.booking');
    Route::get('/booking', [BookingController::class, 'showBookingView'])->name('rooms.booking.view');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/my-bookings/{booking}', [BookingController::class, 'getBookingDetail'])->name('my_bookings.show');
});

Route::middleware(['auth', 'localization'])->group(function () {
    Route::get('/my-bookings', [BookingController::class, 'getBookingHistory'])->name('my_bookings.index');
    Route::get('/my-bookings/{booking}/pay', [BookingController::class, 'payBooking'])->name('my_bookings.pay');
    Route::get('/my-account', [UserController::class, 'editProfile'])->name('my_account.show');

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
    Route::resource('bookings', BookingController::class)->only(['index', 'update', 'show']);
    Route::resource('customers', CustomerController::class)->only(['index']);
    Route::post('/bookings/{booking}/rate', [BookingController::class, 'rateBooking'])->name('bookings.rate');

    Route::resources([
        'room-types' => RoomTypeController::class,
        'rooms' => RoomController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'users' => UserController::class,
        'ratings' => RatingController::class,
    ]);
});
