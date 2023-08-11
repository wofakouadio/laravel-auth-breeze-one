<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\UsersController;
use App\Http\Controllers\vendor\VendorController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//************* HOME CONTROLLER / GUEST ***************
Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'create']);
    Route::post('login', [HomeController::class, 'store'])->name('loginAuth');
});

//************* LOGOUT ***************
Route::post('logout', [HomeController::class, 'destroy'])->name('logout');

//************* SUPER ADMIN CONTROLLER ***************
Route::middleware('super-admin')->prefix('super-admin')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])
        ->name('dashboard');
    Route::get('/view-users', [UsersController::class, 'index'])->name('view-users');
    Route::get('/new-user', [UsersController::class, 'create'])->name('new-user');
    Route::post('/register-new-user', [UsersController::class, 'store'])->name('register-new-user');
});

//************* ADMIN CONTROLLER ***************
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');
});


//************* SALES CONTROLLER ***************
Route::middleware('sales')->prefix('sales')->group(function () {
    Route::get('/dashboard', [SalesController::class, 'index'])
        ->name('dashboard');
});

//************* VENDOR CONTROLLER ***************
Route::middleware('vendor')->prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'index'])
        ->name('dashboard');
});


//************* CUSTOMER CONTROLLER ***************
Route::middleware('customer')->prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'index'])
        ->name('dashboard');
});


//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';
