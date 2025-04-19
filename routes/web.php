<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::post('/search', [FrontController::class, 'redirectToBooking'])->name('search');

Route::get('/booking/{category}', [FrontController::class, 'showBookingForm'])->name('booking.form');
Route::post('/booking/{category}', [FrontController::class, 'storeBooking'])->name('booking.store');

Route::get('about', [FrontController::class, 'about'])->name('about');
Route::get('travel', [FrontController::class, 'travel'])->name('travel');
Route::get('blog', [FrontController::class, 'blog'])->name('blog');

Route::middleware('guest:admin')->prefix('admin')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'store']);


});

Route::middleware('auth:admin')->prefix('admin')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'destroy'])->name('admin.logout');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
  
    Route::get('/buses', [AdminController::class, 'buses'])->name('admin.buses');

// Full create + store for bus + destination + schedule + price
    Route::get('/buses/create', [AdminController::class, 'createFullBusEntry'])->name('admin.buses.create');
    Route::post('/buses/store', [AdminController::class, 'storeFullBusEntry'])->name('admin.buses.store');
    Route::get('/buses/edit/{id}', [AdminController::class, 'editBus'])->name('admin.buses.edit');
    Route::put('/buses/update/{id}', [AdminController::class, 'updateBus'])->name('admin.buses.update');
    
// Delete bus
    Route::delete('/buses/delete/{id}', [AdminController::class, 'deleteBus'])->name('admin.buses.destroy');

    Route::get('/admin/buses/{bus}/seats', [AdminController::class, 'showSeats'])->name('admin.buses.seats');
    Route::get('/get-seats/{scheduleId}', [AdminController::class, 'getSeats']);
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/bookings/create', [AdminController::class, 'createBooking'])->name('admin.bookings.create');
    Route::post('/bookings/store', [AdminController::class, 'storeBooking'])->name('admin.bookings.store');
    Route::post('/bookings/confirm/{id}', [AdminController::class, 'confirmPayment'])->name('bookings.confirm');

});



require __DIR__.'/auth.php';
