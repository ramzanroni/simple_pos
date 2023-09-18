<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AttendenceController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\RelationController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\SupplierController;

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
        Route::get('/delete/customer/{id}', 'deleteCustomer')->name('delete.customer');
        Route::get('/edit/customer/{id}', 'editCustomer')->name('edit.customer');
        Route::post('/update/customer', 'updateCustomer')->name('update.customer');
    });
    
    //supplier
    Route::controller(SupplierController::class)->group(function(){
        Route::get('/all/supplier', 'allSupplier')->name('all.supplier');
        Route::get('/add/supplier', 'addSupplier')->name('add.supplier');
        Route::post('/store/supplier', 'storeSupplier')->name('store.supplier');
        Route::get('/delete/supplier/{id}', 'deleteSupplier')->name('delete.supplier');
        Route::get('/edit/supplier/{id}', 'editSupplier')->name('edit.supplier');
        Route::post('/update/supplier', 'updateSupplier')->name('update.supplier');
        Route::get('/details/supplier/{id}', 'detailsSupplier')->name('details.supplier');
    });

    //advance salary
    Route::controller(SalaryController::class)->group(function(){
        Route::get('/add/advance/salary', 'advanceSalary')->name('advance.salary');
        Route::post('/store/advance/salary', 'storeAdvanceSalary')->name('store.advance.salary');
        Route::get('/all/advance/salary', 'allAdvanceSalary')->name('all.advance.salary');
        Route::get('/edit/advance/salary/{id}', 'editAdvanceSalary')->name('edit.advance.salary');
        Route::post('/update/advance/salary', 'updateSalary')->name('update.advance.salary');
        Route::get('/pay/salary', 'paySalary')->name('pay.salary');
        Route::get('/pay/now/salary/{id}', 'payNowSalary')->name('pay.now.salary');
        Route::post('/store/employee/salary', 'storeEmployeeSalary')->name('store.employee.salary');
        Route::get('/employee/month/salary', 'monthlySalary')->name('emp.month.salary');
        Route::get('/history/salary/{id}', 'salaryHistory')->name('pay.history.salary');
    });
    //Employee Attendance
    Route::controller(AttendenceController::class)->group(function(){
        Route::get('/employee/attendance/list', 'employeeAttendanceList')->name('employee.attendance.list');
        Route::get('/add/employee/attendance', 'addEmployeeAttendance')->name('add.emplpyee.attendance');
    });

    //relations 
    Route::controller(RelationController::class)->group(function(){
        Route::get('/one_to_one_relation', 'getRelation')->name('relation');
        
    });
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
