<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\TestLiveWire;
use App\Http\Controllers\UserController;
use App\Models;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['auth:sanctum', 'verified'], function () {

//    home page
    Route::get('/dashboard',[DashBoardController::class,'home'])->name('dashboard');

//    customers
    Route::get('customers',[CustomerController::class,'getCustomers'])->name('customers');
    Route::get('customers/{customer}',[CustomerController::class,'showCustomer'])->name('customer');
    Route::post('customers',[CustomerController::class,'storeCustomer'])->name('save-customer');
    Route::patch('customers/{customer}',[CustomerController::class,'updateCustomer'])->name('update-customer');

//    users
    Route::get('users',[UserController::class,'getUsers'])->name('users');
    Route::get('users/{user}',[UserController::class,'showUser'])->name('user');
    Route::post('users',[UserController::class,'storeUser'])->name('save-user');
    Route::patch('users/{user}',[UserController::class,'updateUser'])->name('update-user');

//    payments
    Route::get('payments',[PaymentController::class,'getPayments'])->name('payments');
    Route::get('payments/{payment}',[PaymentController::class,'showPayment'])->name('payment');
    Route::post('payments',[PaymentController::class,'storePayment'])->name('save-payment');
    Route::patch('payments/{payment}',[PaymentController::class,'updatePayment'])->name('update-payment');

//    payment-types
    Route::get('payment-types',[PaymentTypeController::class,'getPaymentTypes'])->name('payment-types');
    Route::get('payment-types/{payment-type}',[PaymentTypeController::class,'showPaymentType'])->name('payment-type');
    Route::post('payment-types',[PaymentTypeController::class,'storePaymentType'])->name('save-payment-type');
    Route::patch('payment-types/{payment-type}',[PaymentTypeController::class,'updatePaymentType'])->name('update-payment-type');

//    products
    Route::get('products',[ProductController::class,'getProducts'])->name('products');
    Route::get('products/{product}',[ProductController::class,'showProduct'])->name('product');
    Route::post('products',[ProductController::class,'storeProduct'])->name('save-product');
    Route::patch('products/{product}',[ProductController::class,'updateProduct'])->name('update-product');

//    product-types
    Route::get('product-types',[ProductTypeController::class,'getProductTypes'])->name('product-types');
    Route::get('product-types/{product-type}',[ProductTypeController::class,'showProductType'])->name('product-type');
    Route::post('product-types',[ProductTypeController::class,'storeProductType'])->name('save-product-type');
    Route::patch('product-types/{product-type}',[ProductTypeController::class,'updateProductType'])->name('update-product-type');

//    orders
    Route::get('orders',[OrderController::class,'getOrders'])->name('orders');
    Route::get('orders/{order}',[OrderController::class,'showOrder'])->name('order');
    Route::post('orders',[OrderController::class,'storeOrder'])->name('save-order');
    Route::patch('orders/{order}',[OrderController::class,'updateOrder'])->name('update-order');

//    invoices
    Route::get('invoices',[InvoiceController::class,'getInvoices'])->name('invoices');
    Route::get('invoices/{invoice}',[InvoiceController::class,'showInvoice'])->name('invoice');
    Route::post('invoices',[InvoiceController::class,'storeInvoice'])->name('save-invoice');
    Route::patch('invoices/{invoice}',[InvoiceController::class,'updateInvoice'])->name('update-invoice');

    Route::get('test-live',[TestLiveWire::class,'index'])->name('live');


});




Route::get('test',function (){
   return view('dashboard.index');
});



