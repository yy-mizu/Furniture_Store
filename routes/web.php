<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/customer/account', [CustomerController::class, 'account'])->name('customer.account');

Route::middleware(['admin'])-> group(function(){
    Route::get('/admin/dashboard/orderlist', [AdminController::class, 'order_list'])->name('admin.orderlist');
    Route::get('/admin/dashboard/customerlist', [AdminController::class, 'customer_list'])->name('admin.customerlist');

    Route::get('/admin/dashboard/stafflist', [AdminController::class, 'staff_list'])->name('admin.stafflist');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login/process', [LoginController::class, 'login'])->name('admin.login.process');

Route::get('/admin/staff/create', [AdminController::class, 'create_staff'])->name('admin.staff.create');
Route::get('/admin/staff/create/process', [AdminController::class, 'create_staff_process'])->name('admin.staff.create.process');

Route::get('/admin/dashboard/productlist', [ProductController::class, 'product_list'])->name('admin.productlist');
Route::get('/admin/product/create', [ProductController::class, 'create_product'])->name('admin.product.create');
Route::post('/admin/product/create/process', [ProductController::class, 'create_product_process'])->name('admin.product.create.process');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
