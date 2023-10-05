<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guestOrVerified', 'set_locale'])->group(function () {


    require __DIR__ . '/auth.php';

    Route::get('locale/{locale}', [\App\Http\Controllers\LanguageController::class, 'changeLocale'])->name('locale');


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
    Route::get('/{category}', [\App\Http\Controllers\SearchController::class, 'searchCategory'])->name('searchCategory')->where('category', '[0-9]+');


    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product');

    Route::prefix('/cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');

        Route::post('/add/{product:slug}', [CartController::class, 'add'])->name('add');
        Route::post('/remove/{product:slug}', [CartController::class, 'remove'])->name('remove');
        Route::post('/update-quantity/{product:slug}',
            [CartController::class, 'updateQuantity'])->name('update-quantity');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

