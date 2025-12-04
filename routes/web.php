<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\PageController as FrontPageController;
use App\Http\Controllers\Frontend\JobController as FrontJobController;
use App\Http\Controllers\AuthController;

Route::get('/', [FrontPageController::class, 'home'])->name('/');
Route::get('/pages/{slug}', [FrontPageController::class, 'show'])->name('pages.show');

// Frontend job routes (public)
Route::get('/jobs', [FrontJobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [FrontJobController::class, 'show'])->name('jobs.show');
Route::post('/jobs/{slug}/apply', [FrontJobController::class, 'apply'])->name('jobs.apply');

// Manual Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CMS admin routes (basic scaffolding)
// Route::prefix('admin')->name('admin.')->group(function () {
//     // Protect admin routes with auth middleware
// })->middleware('auth');

// Re-register the admin group with middleware (keeps existing structure)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Backend\PostController::class);
    Route::resource('galleries', App\Http\Controllers\Backend\GalleryController::class);
    Route::resource('galleries.items', App\Http\Controllers\Backend\GalleryItemController::class);
    Route::resource('banners', App\Http\Controllers\Backend\BannerController::class);
    Route::resource('pages', App\Http\Controllers\Backend\PageController::class);

    // Page builder: sections and blocks management + reorder endpoints
    Route::resource('pages.sections', App\Http\Controllers\Backend\PageSectionController::class);
    Route::resource('sections.blocks', App\Http\Controllers\Backend\PageBlockController::class);
    Route::post('pages/{page}/sections/reorder', [App\Http\Controllers\Backend\PageSectionController::class, 'reorder'])->name('pages.sections.reorder');
    Route::post('sections/{section}/blocks/reorder', [App\Http\Controllers\Backend\PageBlockController::class, 'reorder'])->name('sections.blocks.reorder');

    // Job management
    Route::resource('job_departments', App\Http\Controllers\Backend\JobDepartmentController::class);
    Route::resource('job_posts', App\Http\Controllers\Backend\JobPostController::class);
    Route::resource('job_posts.applications', App\Http\Controllers\Backend\JobApplicationController::class);
});
