<?php

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




Route::get('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
Route::group(['prefix' => 'panel','middleware'=>'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Panel\SinglePageController::class, 'index'])->name('panel.index');
    Route::get('suppliers/create', function () {
    return view('panel.suppliers.create');
})->name('panel.suppliers.create');
Route::get('suppliers/index', function () {
    return view('panel.suppliers.index');
})->name('panel.suppliers.index');


    Route::resource('users', \App\Http\Controllers\Panel\UserController::class);
    Route::resource('categories', \App\Http\Controllers\Panel\CategoryController::class);
    Route::resource('products', \App\Http\Controllers\Panel\ProductController::class);
});
