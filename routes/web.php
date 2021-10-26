<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\ProductController as FrontEndProductController;
use App\Http\Controllers\Panel\AccountBlockedController;
use App\Http\Controllers\Panel\ConsignmentDeleteController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\EmployeeController;
use App\Http\Controllers\Panel\GroupGoodsController;
use App\Http\Controllers\Panel\OrderController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\ProductsDeletedController;
use App\Http\Controllers\Panel\ProductTypeController;
use App\Http\Controllers\Panel\SinglePageController;
use App\Http\Controllers\Panel\SuppliersController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\WareHousesController;
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

Route::resource('change-password', NewPasswordController::class);
// Group panel: users, employee, customers, products, suppliers, categories
Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function () {
    // page home when you access admin management page
    Route::get('/', [SinglePageController::class, 'index'])->name('panel.index');

    // Routes Suppliers
    // Route::get('suppliers/create', function () {
    //     return view('panel.suppliers.create');
    // })->name('panel.suppliers.create');

    // Route::get('suppliers/index', function () {
    //     return view('panel.suppliers.index');
    // })->name('panel.suppliers.index');

    //Routes Users
    Route::get('profile', function () {
        return response()->view('panel.users.profile-details');
    })->name('users.profile');

    Route::resource('users', UserController::class);

    //Routes show blocked accounts
    Route::resource('accounts-locked', AccountBlockedController::class);

    //Routes show consignment delete
    Route::resource('consignment-delete', ConsignmentDeleteController::class);

    //Routes Employees
    Route::resource('employees', EmployeeController::class);

    //Routes customers
    Route::resource('customers', CustomerController::class);

    //Routes Group Goods
    Route::resource('groupgoods', GroupGoodsController::class);

    //Routes Product Types
    Route::resource('product-type', ProductTypeController::class);

    //Routes products
    Route::resource('products', ProductController::class);

    Route::get('/product/product-deleted', [ProductsDeletedController::class, 'index'])->name('product.listDeleted');

    Route::get('/product/product-deleted-detail/{id}', [ProductsDeletedController::class, 'show'])->name('product.detailDeleted');

    Route::post('/product/product-deleted-restore/{id}', [ProductsDeletedController::class, 'restore'])->name('product.restoreProduct');

    //Routes Warehouse
    Route::resource('warehouses', WareHousesController::class);

    //Routes Suppliers
    Route::resource('suppliers', SuppliersController::class);

    //Routes Orders
    Route::get('/orders/index', [OrderController::class, 'index'])->name('order.index');

    Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');

    Route::post('/orders/getCustomer', [OrderController::class, 'getCustomer'])->name('getCustomers');

    Route::get('orders/create/add-cart/{id}', [OrderController::class, 'addToCart'])->name('addToCart');

    Route::get('orders/create/show-cart', [OrderController::class, 'showCart'])->name('showCart');

    Route::get('orders/create/update-cart', [OrderController::class, 'updateCart'])->name('updateCart');

    Route::post('/orders/create', [OrderController::class, 'store'])->name('order.store');

    Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');

    Route::post('/orders/edit/{id}', [OrderController::class, 'update'])->name('order.update');

    Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('order.show');

    Route::post('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('order.delete');

    Route::get('/orders/table-delete', [OrderController::class, 'tableOrderDelete'])->name('order.tableDelete');

    Route::post('orders/table-delete/{id}', [OrderController::class, 'getBack'])->name('order.getBack');

});

//Routes FrontEnd
Route::group(['prefix' => 'frontend'], function () {
    Route::get('/index', [FrontEndProductController::class, 'index'])->name('frontend.index');
    Route::get('/shop', [FrontEndProductController::class, 'shop'])->name('shop.index');

    Route::get('/cart/show', [FrontEndProductController::class, 'showCart'])->name('show.cart');
    Route::get('/add-to-cart/{id}', [FrontEndProductController::class, 'addToCart1'])->name('add.to.cart');
    // Route::get('/add-cart/{id}', [FrontEndProductController::class, 'addCart2'])->name('add.cart');

    Route::get('/update-cart', [FrontEndProductController::class, 'update'])->name('update.cart');
    Route::get('/remove-from-cart', [FrontEndProductController::class, 'remove'])->name('remove.from.cart');
    Route::get('/check-out', [FrontEndProductController::class, 'checkout'])->name('checkout.cart');
    Route::post('/check-out', [CheckoutController::class , 'store'])->name('paybycash.cart');

});
