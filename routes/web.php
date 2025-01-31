<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama
Route::get('/', [FrontController::class, 'index'])->name('front.index');

// Route untuk kategori workshop
Route::get('/browse/{category:slug}', [FrontController::class, 'category'])->name('front.category');

// Route untuk detail workshop
Route::get('/details/{workshop:slug}', [FrontController::class, 'details'])->name('front.details');

Route::get('/film', [FrontController::class, 'film'])->name('front.film');

// Route untuk cek booking
Route::get('/check-booking', [BookingController::class, 'checkBooking'])->name('front.check_booking');
Route::post('/check-booking/details', [BookingController::class, 'checkBookingDetails'])->name('front.check_booking_details');

// Route untuk pembayaran
Route::get('/booking/payment', [BookingController::class, 'payment'])->name('front.payment');
Route::post('/booking/payment', [BookingController::class, 'paymentStore'])->name('front.payment_store');

// Route untuk proses booking
Route::get('/booking/{workshop:slug}', [BookingController::class, 'booking'])->name('front.booking');
Route::post('/booking/{workshop:slug}', [BookingController::class, 'bookingStore'])->name('front.booking_store');

// Route untuk booking selesai
Route::get('/booking/finished/{bookingTransaction}', [BookingController::class, 'bookingFinished'])->name('front.booking_finished');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');