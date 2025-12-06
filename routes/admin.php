<?php

use Illuminate\Support\Facades\Route;

// CMS admin routes (basic scaffolding)
// Route::prefix('admin')->name('admin.')->group(function () {
//     // Protect admin routes with auth middleware
// })->middleware('auth');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Backend\PostController::class);
    Route::resource('galleries', App\Http\Controllers\Backend\GalleryController::class);
    Route::resource('galleries.items', App\Http\Controllers\Backend\GalleryItemController::class);
    Route::resource('banners', App\Http\Controllers\Backend\BannerController::class);
    Route::resource('pages', App\Http\Controllers\Backend\PageController::class);
    Route::resource('packages', App\Http\Controllers\Backend\PackageController::class);
	Route::resource('subscriptions', App\Http\Controllers\Backend\SubscriptionController::class);
    Route::resource('admissions', App\Http\Controllers\Backend\AdmissionController::class);

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