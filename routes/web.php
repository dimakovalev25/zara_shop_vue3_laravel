<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guestOrVerified', 'set_locale'])->group(function () {
    Route::get('locale/{locale}', [\App\Http\Controllers\LanguageController::class, 'changeLocale'])->name('locale');
    Route::get('/get-session-data', [\App\Http\Controllers\LanguageController::class, 'getSessionData']);
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
    Route::get('/{category}',
        [\App\Http\Controllers\SearchController::class, 'searchCategory'])->name('searchCategory')->where('category',
        '[0-9]+');
    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product');

    Route::prefix('/cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');

        Route::post('/add/{product:slug}', [CartController::class, 'add'])->name('add');
        Route::post('/remove/{product:slug}', [CartController::class, 'remove'])->name('remove');
        Route::post('/update-quantity/{product:slug}',
            [CartController::class, 'updateQuantity'])->name('update-quantity');
    });

    Route::post('/cart', [ProfileController::class, 'approve'])->name('approve');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::delete('/remove-all-items-from-cart', [CartController::class, 'removeAllItemsFromCart']);
});

Route::middleware(['auth', 'verified', 'set_locale'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile');
    Route::post('/profile/password-update', [ProfileController::class, 'passwordUpdate'])->name('password-update');

});

Route::middleware(['set_locale'])->group(function () {
    require __DIR__ . '/auth.php';
});



Route::get('/{path}', [\App\Http\Controllers\NotFoundController::class, 'index'])->where('path', '.*');