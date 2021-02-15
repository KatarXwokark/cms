<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

// Route::get('/dashboard', function () {
//     return view('cms.dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/profile', [CmsController::class, 'profile']);
Route::get('/categories', [CmsController::class, 'categories']);
Route::get('/products', [CmsController::class, 'products']);
Route::get('/components', [CmsController::class, 'components']);
Route::get('/templates', [CmsController::class, 'templates']);
Route::get('/pages', [CmsController::class, 'pages']);
Route::get('/languages', [CmsController::class, 'languages']);
Route::get('/users', [CmsController::class, 'users']);

Route::get('/api/page', [PageController::class, 'index']); 
Route::post('/api/page', [PageController::class, 'store']); 
Route::get('/api/page/{id}', [PageController::class, 'show']); 
Route::put('/api/page/{id}', [PageController::class, 'update']); 
Route::delete('/api/page/{id}', [PageController::class, 'destroy']);

Route::get('/api/template', [TemplateController::class, 'index']); 
Route::post('/api/template', [TemplateController::class, 'store']); 
Route::get('/api/template/{id}', [TemplateController::class, 'show']); 
Route::put('/api/template/{id}', [TemplateController::class, 'update']); 
Route::delete('/api/template/{id}', [TemplateController::class, 'destroy']);

Route::get('/api/language', [LanguageController::class, 'index']); 
Route::post('/api/language', [LanguageController::class, 'store']); 
Route::get('/api/language/{id}', [LanguageController::class, 'show']); 
Route::put('/api/language/{id}', [LanguageController::class, 'update']); 
Route::delete('/api/language/{id}', [LanguageController::class, 'destroy']);

Route::get('/api/product', [ProductController::class, 'index']); 
Route::post('/api/product', [ProductController::class, 'store']); 
Route::get('/api/product/{id}', [ProductController::class, 'show']); 
Route::put('/api/product/{id}', [ProductController::class, 'update']); 
Route::delete('/api/product/{id}', [ProductController::class, 'destroy']);

Route::get('/api/category', [CategoryController::class, 'index']); 
Route::post('/api/category', [CategoryController::class, 'store']); 
Route::get('/api/category/{id}', [CategoryController::class, 'show']); 
Route::put('/api/category/{id}', [CategoryController::class, 'update']); 
Route::delete('/api/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/api/component', [ComponentController::class, 'index']); 
Route::post('/api/component', [ComponentController::class, 'store']); 
Route::get('/api/component/{id}', [ComponentController::class, 'show']); 
Route::put('/api/component/{id}', [ComponentController::class, 'update']); 
Route::delete('/api/component/{id}', [ComponentController::class, 'destroy']);


require __DIR__.'/auth.php';