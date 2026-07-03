<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AllergenController;


Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/menu', [PublicController::class, 'menu'])->name('menu');
Route::get('/menu/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/contacts', [PublicController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [MailController::class, 'contactUs'])->name('contactUs');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', function() { return redirect()->route('products.create'); });
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/allergens/create', [AllergenController::class, 'create'])->name('allergens.create');
Route::post('/allergens', [AllergenController::class, 'store'])->name('allergens.store');
