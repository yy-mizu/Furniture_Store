<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/customer/account', [CustomerController::class, 'account'])->name('customer.account');

Route::middleware(['admin'])-> group(function(){
  
    Route::get('/admin/dashboard/stafflist', [AdminController::class, 'stafflist'])->name('admin.stafflist');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login/process', [LoginController::class, 'login'])->name('admin.login.process');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
