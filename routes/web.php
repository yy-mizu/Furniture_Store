<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', [CustomerController::class, 'home'])->name('customer.home');
Route::get('/detail/{id}', [CustomerController::class, 'detail'])->name('customer.product.detail');
Route::get('/shop', [CustomerController::class, 'shop'])->name('customer.shop');
Route::get('/blogs', [CustomerController::class, 'blogs'])->name('customer.blogs');
Route::get('/about', [CustomerController::class, 'about'])->name('customer.about');
Route::get('/contact', [CustomerController::class, 'contact'])->name('customer.contact');

Route::get('/customer/account', [CustomerController::class, 'account'])->name('customer.account');


Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login/process', [LoginController::class, 'login'])->name('admin.login.process');
Route::middleware(['admin'])->group(function () {

   
    Route::get('/admin/logout', [LoginController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/dashboard/orderlist', [AdminController::class, 'order_list'])->name('admin.orderlist');
    Route::get('/admin/dashboard/customerlist', [AdminController::class, 'customer_list'])->name('admin.customerlist');

   
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


    //FOR ADMINS
    Route::get('/admin/dashboard/stafflist', [AdminController::class, 'staff_list'])->name('admin.stafflist');
    Route::get('/admin/staff/create', [AdminController::class, 'create_staff'])->name('admin.staff.create');
    Route::post('/admin/staff/create/process', [AdminController::class, 'create_staff_process'])->name('admin.staff.create.process');
    Route::get('/admin/staff/edit/{id}', [AdminController::class, 'edit_staff'])->name('admin.staff.edit');
    Route::patch('/admin/staff/edit/process', [AdminController::class, 'edit_staff_process'])->name('admin.staff.edit.process');
    Route::get('/admin/staff/delete/{id}', [AdminController::class, 'delete_staff'])->name('admin.staff.delete');

    //FOR PRODUCTS
    Route::get('/admin/dashboard/productlist', [ProductController::class, 'product_list'])->name('admin.productlist');
    Route::get('/admin/product/create', [ProductController::class, 'create_product'])->name('admin.product.create');
    Route::post('/admin/product/create/process', [ProductController::class, 'create_product_process'])->name('admin.product.create.process');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit_product'])->name('admin.product.edit');
    Route::patch('/admin/product/edit/process', [ProductController::class, 'edit_product_process'])->name('admin.product.edit.process');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete_product'])->name('admin.product.delete');

    //FOR CATEGORY
    Route::get('/admin/dashboard/categorylist', [CategoryController::class, 'category_list'])->name('admin.categorylist');
    Route::get('/admin/category/create/', [CategoryController::class, 'create_category'])->name('admin.category.create');
    Route::post('/admin/category/create/process', [CategoryController::class, 'create_category_process'])->name('admin.category.create.process');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('admin.category.delete');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('admin.category.edit');
    Route::patch('/admin/category/edit/process', [CategoryController::class, 'edit_category_process'])->name('admin.category.edit.process');
    

    //FOR SUPPLIER
    Route::get('/admin/dashboard/supplierlist', [AdminController::class, 'supplier_list'])->name('admin.supplierlist');
    Route::get('/admin/supplier/create/', [AdminController::class, 'create_supplier'])->name('admin.supplier.create');
    Route::post('/admin/supplier/create/process', [AdminController::class, 'create_supplier_process'])->name('admin.supplier.create.process');
    Route::get('/admin/supplier/delete/{id}', [AdminController::class, 'delete_supplier'])->name('admin.supplier.delete');
    Route::get('/admin/supplier/edit/{id}', [AdminController::class, 'edit_supplier'])->name('admin.supplier.edit');
    Route::patch('/admin/supplier/edit/process', [AdminController::class, 'edit_supplier_process'])->name('admin.supplier.edit.process');
    
    //FOR ORDER
    Route::get('/admin/orderlist', [AdminController::class, 'order_list'])->name('admin.orderlist');
});



Route::get('/cart', [App\Http\Controllers\CustomerController::class, 'cart'])->name('customer.cart');
Route::post('add-to-cart/', [CustomerController::class, 'addtocart'])->name('add_to_cart');
Route::patch('update-cart', [CustomerController::class, 'updatecart'])->name('update_cart');
Route::delete('remove-from-cart', [CustomerController::class, 'removecart'])->name('remove_from_cart');
Route::delete('clear-cart', [CustomerController::class, 'clearcart'])->name('clear_cart');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fetch-products/category}', [App\Http\Controllers\CustomerController::class, 'fetch_category_new_products'])->name('fetch_category_new_products');

// Route::post('upload',  [UploadController::class, 'store'])->name('upload.store');
// Route::post('delete', [UploadController::class, 'delete'])->name('upload.delete');

Route::post('/session', [StripePaymentController::class, 'session'])->name('session');
Route::get('/success', [StripePaymentController::class, 'success'])->name('success');

Route::get('/cancel', [StripePaymentController::class, 'cancel'])->name('cancel');