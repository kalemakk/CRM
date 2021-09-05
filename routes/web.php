<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('customers',[Customer::class,'getCustomers'])->name('customers');
Route::get('customers/{customer}',[Customer::class,'showCustomer'])->name('customer');
Route::post('customers',[Customer::class,'storeCustomer'])->name('save-customer');
Route::patch('customers/{customer}',[Customer::class,'updateCustomer'])->name('update-customer');


