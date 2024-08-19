<?php

use App\Http\Controllers\PaymentController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/card', function () {
    return view('pages.payment');
});

Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');


Route::post('/webhook', [PaymentController::class, 'handleWebhook'])->name('webhook');

Route::get('/payment-success', function () {
    return 'Payment successful!';
})->name('payment.success');

Route::get('/payment-failed', function () {
    return 'Payment failed. Please try again.';
})->name('payment.failed');
