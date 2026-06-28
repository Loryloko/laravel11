<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AllergenController;


Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/menu', [PublicController::class, 'menu'])->name('menu');
Route::get('/contacts', [PublicController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [MailController::class, 'contactUs'])->name('contactUs');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/profile', [PublicController::class, 'profile'])->name('user.profile');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', function() { return redirect()->route('products.create'); });

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/menu/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/allergens/create', [AllergenController::class, 'create'])->name('allergens.create');
Route::post('/allergens', [AllergenController::class, 'store'])->name('allergens.store');