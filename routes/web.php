<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

/*
|--------------------------------------------------------------------------
| Careers Pages
|--------------------------------------------------------------------------
*/

// List all careers
Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');

// Show application form
Route::get('/careers/apply', [CareerController::class, 'apply'])->name('careers.apply');

// Handle form submission
Route::post('/careers/submit', [ApplicationController::class, 'store'])->name('careers.submit');

/*
|--------------------------------------------------------------------------
| Form Submissions
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Language Switcher
|--------------------------------------------------------------------------
*/

Route::get('/lang/{lang}', function ($lang) {
    session(['locale' => $lang]);
    return redirect()->back();
})->name('lang.switch');
