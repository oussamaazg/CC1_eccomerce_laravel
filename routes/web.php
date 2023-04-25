<?php

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


//login logout & register routes
Auth::routes();

//home route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//activate user account routes
Route::get('/activate/{code}', [App\Http\Controllers\ActivationController::class, 'activateUserAccount'])->name('user.activate');
Route::get('/resend/{email}', [App\Http\Controllers\ActivationController::class, 'resendActivationCode'])->name('code.resend');

//products routes
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::get('products/category/{category}', [App\Http\Controllers\HomeController::class, 'getProductByCategory'])->name('category.products');

//cart routes
Route::post('/cart/{product}', [App\Http\Controllers\CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show_cart'])->name('show_cart');
Route::patch('/cart/{cart}', [App\Http\Controllers\CartController::class, 'update_cart'])->name('update_cart');
Route::delete('/cart/{cart}', [App\Http\Controllers\CartController::class, 'delete_cart'])->name('delete_cart');

//payement routes
Route::get('handle-payment', [App\Http\Controllers\PayPalPaymentController::class,'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [App\Http\Controllers\PayPalPaymentController::class,'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [App\Http\Controllers\PayPalPaymentController::class,'paymentSuccess'])->name('success.payment');

//Admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class,'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class,'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class,'adminLogout'])->name('admin.logout');


//adminlte
Route::resource('productsAdmin', App\Http\Controllers\ProductAdminController::class);
Route::resource('orders', App\Http\Controllers\OrderController::class);
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('/orders/{id}/receipt', [App\Http\Controllers\OrderController::class,'order_receipt'])->name('order.receipt');

