<?php

use App\Http\Controllers\BranchController;
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

        // Branch
        Route::get('/{id}/branches', [BranchController::class, 'index'])->name('branches.index');
        Route::post('/{id}/branches', [BranchController::class, 'create'])->name('branches.create');
        Route::get('/{id}/branches/{branch}', [BranchController::class, 'edit'])->name('branches.edit');
        Route::put('/{id}/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
        Route::delete('/{id}/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('customers', CustomerController::class);
    });



    // Route::get('/users', function () {
    //     return view('pages.users');
    // })->name('users');

    // Route::get('/profile', function () {
    //     return view('pages.profile');
    // })->name('profile');
});
