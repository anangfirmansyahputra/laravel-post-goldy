<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BundleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::get('/{id}', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('/{id}/products', ProductController::class)->names([
            'index' => 'products.index',
            'create' => 'products.create',
            'store' => 'products.store',
            'show' => 'products.show',
            'edit' => 'products.edit',
            'update' => 'products.update',
            'destroy' => 'products.destroy',
        ]);
    });

    Route::resource('branches', BranchController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('bundles', BundleController::class);



    // Route::get('/users', function () {
    //     return view('pages.users');
    // })->name('users');

    // Route::get('/profile', function () {
    //     return view('pages.profile');
    // })->name('profile');
});
