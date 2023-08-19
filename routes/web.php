<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::post('/admin/profile-update', 'adminProfileUpdate')->name('admin.update_admin_profile');
        Route::get('/admin/password', 'profilePassword')->name('admin.password');
        Route::post('/admin/update-password', 'adminPasswordUpdate')->name('admin.update-password');
        Route::get('/admin/logout-page', 'adminLogoutPage')->name('admin.logout-page');
    });
    // Employee 
    Route::controller(EmployeeController::class)->group(function(){
        Route::get('/all/employee', 'allEmployee')->name('all.employee');
        Route::get('/add/employee', 'addEmployee')->name('add.employee');
        Route::post('/store/employee', 'storeEmployee')->name('store.employee');
        Route::get('/edit/employee/{id}', 'editEmployee')->name('edit.employee');
        Route::post('/update/employee', 'updateEmployee')->name('update.employee');
        Route::get('/delete/employee/{id}', 'deleteEmployee')->name('delete.employee');
    });
    
    //Customer
    Route::controller(CustomerController::class)->group(function(){
        Route::get('/all/customer', 'allCustomer')->name('all.customer');
        Route::get('/add/customer', 'addCustomer')->name('add.customer');
        Route::post('/store/customer', 'storeCustomer')->name('store.customer');
    });
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
