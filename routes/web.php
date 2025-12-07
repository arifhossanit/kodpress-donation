<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\PageController as FrontPageController;
use App\Http\Controllers\Frontend\JobController as FrontJobController;
use App\Http\Controllers\Frontend\PostController as FrontPostController;
use App\Http\Controllers\AuthController;

Route::get('/', [FrontPageController::class, 'home'])->name('/');
Route::get('/pages/{slug}', [FrontPageController::class, 'show'])->name('pages.show');

// Frontend job routes (public)
Route::get('/jobs', [FrontJobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [FrontJobController::class, 'show'])->name('jobs.show');
Route::post('/jobs/{slug}/apply', [FrontJobController::class, 'apply'])->name('jobs.apply');

// Frontend blog routes (public)
Route::get('/blog', [FrontPostController::class, 'index'])->name('posts.index');
Route::get('/blog/{slug}', [FrontPostController::class, 'show'])->name('posts.show');

// Manual Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Frontend membership routes
Route::get('/subscriptions', [App\Http\Controllers\Frontend\SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::get('/subscriptions/{slug}', [App\Http\Controllers\Frontend\SubscriptionController::class, 'show'])->name('subscriptions.show');
Route::post('/subscriptions/{slug}/subscribe', [App\Http\Controllers\Frontend\SubscriptionController::class, 'subscribe'])->name('subscriptions.subscribe')->middleware('auth');

// Profile routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Gallery routes
Route::get('/galleries/{slug}', [App\Http\Controllers\Frontend\GalleryController::class, 'show'])->name('galleries.show');

// Admissions frontend routes
Route::get('/admissions/apply', [App\Http\Controllers\Frontend\AdmissionController::class, 'showForm'])->name('admissions.apply');
Route::post('/admissions', [App\Http\Controllers\Frontend\AdmissionController::class, 'store'])->name('admissions.store');
Route::get('/admissions/thankyou', [App\Http\Controllers\Frontend\AdmissionController::class, 'thankyou'])->name('admissions.thankyou');

