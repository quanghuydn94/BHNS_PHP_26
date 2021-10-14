<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Panel\BlockedAccountController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\UserController;
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

Route::resource('change-password', NewPasswordController::class );
// Group panel: users, employee, customers, products, suppliers, categories
Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function () {
    // page home when you access admin management page
    Route::get('/', [\App\Http\Controllers\Panel\SinglePageController::class, 'index'])->name('panel.index');

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

    Route::resource('users',  UserController::class);

    //Routes show blocked accounts
    Route::resource('accounts-locked', App\Http\Controllers\Panel\AccountBlockedController::class);

    // Route::get('unlock/{id}', [UserController::class , 'unlock'])->name('account.unlock ');

    //Routes Employees
    Route::resource('employees', \App\Http\Controllers\Panel\EmployeeController::class);

    //Routes customers
    Route::resource('customers', CustomerController::class);
        Route::get('customer-history', [CustomerController::class , 'historySales'])->name('customers.historyCustomer');

    //Routes categories
    Route::resource('categories', \App\Http\Controllers\Panel\CategoryController::class);

    //Routes products
    Route::resource('products', \App\Http\Controllers\Panel\ProductController::class);
});
