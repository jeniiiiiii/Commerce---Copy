<?php

// use App\Http\Controllers\CobaController;

use App\Http\Controllers\CobaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'Home']);
Route::get('/product/{id}-{name}', [HomeController::class, 'Product']);

Route::get('/test', [CobaController::class, 'Index']);
Route::get('/contact', [ContactController::class, 'View']);
Route::post('/contact', [ContactController::class, 'ActionContact']);

Route::get('/contact', [ContactController::class, 'View'])->name('contact');
Route::get('/contact/list', [ContactController::class, 'ContactList'])->name('contactlist');
Route::delete('/contact/{id}', [ContactController::class, 'delete'])->name('contact.delete');

Route::view('/cart', 'cart');
Route::view('/product', 'product');
Route::view('/login', 'login');

