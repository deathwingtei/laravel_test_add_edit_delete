<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CustomerController;

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

Route::get('/', [CustomerController::class,'index'])->name('customer');
Route::post('/customer/store_update', [CustomerController::class,'store_update'])->name('updateCustomer');
Route::get('/customer/softdelete/{id}', [CustomerController::class,'softdelete'])->name('softdeleteCustomer');
Route::get('/customer/delete/{id}', [CustomerController::class,'delete'])->name('deleteCustomer');