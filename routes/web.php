<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdcutController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('admin.layouts');
// });
// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/update-profile-information-form', [UserController::class, 'edit'])->name('admin-edit');

    Route::prefix('dashboard/product')->group(function () {
        Route::get('create', [ProdcutController::class, 'create'])->name('product.create');
        Route::post('store', [ProdcutController::class, 'store'])->name('product.store');
        Route::get('edit/{product}', [ProdcutController::class, 'edit'])->name('product.edit');
        Route::get('index', [ProdcutController::class, 'index'])->name('product.index');
        Route::delete('destroy/{product}', [ProdcutController::class, 'destroy'])->name('product.destroy');
    });

    Route::prefix('dashboard/category')->group(function () {
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
});



require_once __DIR__ . '/jetstream.php';
