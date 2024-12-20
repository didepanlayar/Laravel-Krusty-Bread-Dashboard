<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Remove Register Page
Route::match(['GET', 'POST'], '/register', function() {
    return redirect('/login');
})->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Users
Route::resource('users', UserController::class);

// Customers
Route::resource('customers', CustomerController::class);

// Sales Type
Route::resource('sales-type', SalesTypeController::class);

// Payments
Route::resource('payments', PaymentController::class);

// Categories
Route::resource('categories', CategoryController::class);

// Materials
Route::resource('materials', MaterialController::class);

// Products
Route::resource('products', ProductController::class);
