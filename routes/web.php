<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Panel\AccountBlockedController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\EmployeeController;
use App\Http\Controllers\Panel\GroupGoodsController;
use App\Http\Controllers\Panel\OrdersController;
use App\Http\Controllers\Panel\OrderDetailController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\ProductTypeController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\WareHousesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\SinglePageController;
use App\Http\Controllers\Panel\SuppliersController;

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
// Authentication Login and logout
Route::get('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
// Route::get('/panel/change-password/{id}', function ($id) {
//     $user = \App\Models\User::find((int)$id);
//     return response()->view('auth.changePassword',['user'=>$user]);
// })->name('employees.change-password');

Route::resource('change-password', NewPasswordController::class);
// Group panel: users, employee, customers, products, suppliers, categories
Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function () {
    // page home when you access admin management page
    Route::get('/', [SinglePageController::class, 'index'])->name('panel.index');

    // Routes Suppliers
    Route::get('suppliers/create', function () {
        return view('panel.suppliers.create');
    })->name('panel.suppliers.create');

    Route::get('suppliers/index', function () {
        return view('panel.suppliers.index');
    })->name('panel.suppliers.index');

    //Routes Users
    Route::get('profile', function () {
        return response()->view('panel.users.profile-details');
    })->name('users.profile');

    Route::resource('users', UserController::class);

    //Routes show blocked accounts
    Route::resource('accounts-locked', AccountBlockedController::class);

    // Route::get('unlock/{id}', [UserController::class , 'unlock'])->name('account.unlock ');

    //Routes Employees
    Route::resource('employees', EmployeeController::class);

    //Routes customers
    Route::resource('customers', CustomerController::class);
    Route::get('customer-history', [CustomerController::class, 'historySales'])->name('customers.historyCustomer');

    //Routes Group Goods
    Route::resource('groupgoods', GroupGoodsController::class);

    //Routes Product Types
    Route::resource('product-type', ProductTypeController::class);

    //Routes products
    Route::resource('products', ProductController::class);

    //Routes Warehouse
    Route::resource('warehouses', WareHousesController::class);

//Routes Suppliers
    Route::resource('suppliers', SuppliersController::class);

    //Routes Orders
Route::resource('orders', OrdersController::class);

//Routes OrderDetails
Route::resource('orderDetails', OrderDetailController::class);


});
