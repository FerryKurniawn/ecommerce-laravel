<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

use App\Http\Controllers\ProductController;

Route::middleware(['auth'])->group(function() {
    Route::resource('admin/products', ProductController::class);
});

use App\Http\Controllers\CartController;

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
});

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Anda telah logout.');
})->name('logout');

    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::middleware(['auth'])->group(function () {

    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
});


// Route untuk melihat detail produk (jika perlu)

// Route untuk menambah produk ke keranjang


require __DIR__.'/auth.php';
