<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers_view');
    Route::match(['get','post'],'/add-customer', [CustomerController::class, 'storeCustomer'])->name('store_customer');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customer_view');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customer_edit');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customer_delete');
    Route::get('/export-pdf', [CustomerController::class, 'exportToPDF'])->name('customers.export.pdf');

});

require __DIR__.'/auth.php';
