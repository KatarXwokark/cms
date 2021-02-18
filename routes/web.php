<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;

Route::get('/admin', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Route::get('/dashboard', function () {
//     return view('cms.dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/admin/profile', [CmsController::class, 'profile'])
    ->middleware(['auth', 'web'])
    ->name('profile');
Route::get('/admin/categories', [CmsController::class, 'categories'])
    ->middleware(['auth', 'web'])
    ->name('categories');
Route::get('/admin/products', [CmsController::class, 'products'])
    ->middleware(['auth', 'web'])
    ->name('products');
// Route::get('/components', [CmsController::class, 'components'])->name('product');
Route::get('/admin/templates', [CmsController::class, 'templates'])
    ->middleware(['auth', 'web'])
    ->name('templates');
Route::get('/admin/pages', [CmsController::class, 'pages'])
    ->middleware(['auth', 'web'])
    ->name('pages');
// Route::get('/languages', [CmsController::class, 'languages']);
Route::get('/admin/users', [CmsController::class, 'users'])
    ->middleware(['auth', 'web'])
    ->name('users');

Route::get('/api/page', [PageController::class, 'index']);
Route::post('/api/page', [PageController::class, 'store']);
Route::get('/api/page/{id}', [PageController::class, 'show']);
Route::put('/api/page/{id}', [PageController::class, 'update']);
Route::delete('/api/page/{id}', [PageController::class, 'destroy']);
Route::get('/admin/page/{id}/edit', [PageController::class, 'edit'])->middleware(['auth', 'web'])->name('page.edit');

Route::get('/api/template', [TemplateController::class, 'index']);
Route::post('/api/template', [TemplateController::class, 'store']);
Route::get('/api/template/{id}', [TemplateController::class, 'show']);
Route::put('/api/template/{id}', [TemplateController::class, 'update']);
Route::delete('/api/template/{id}', [TemplateController::class, 'destroy']);
Route::get('/admin/template/{id}/edit', [TemplateController::class, 'edit'])->middleware(['auth', 'web'])->name('template.edit');

// Route::get('/api/language', [LanguageController::class, 'index']); 
// Route::post('/api/language', [LanguageController::class, 'store']); 
// Route::get('/api/language/{id}', [LanguageController::class, 'show']); 
// Route::put('/api/language/{id}', [LanguageController::class, 'update']); 
// Route::delete('/api/language/{id}', [LanguageController::class, 'destroy']);

Route::get('/api/product', [ProductController::class, 'index']);
Route::post('/api/product', [ProductController::class, 'store']);
Route::get('/api/product/{id}', [ProductController::class, 'show']);
Route::put('/api/product/{id}', [ProductController::class, 'update']);
Route::delete('/api/product/{id}', [ProductController::class, 'destroy']);
Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->middleware(['auth', 'web'])->name('product.edit');

Route::get('/api/category', [CategoryController::class, 'index']);
Route::post('/api/category', [CategoryController::class, 'store']);
Route::get('/api/category/{id}', [CategoryController::class, 'show']);
Route::put('/api/category/{id}', [CategoryController::class, 'update']);
Route::delete('/api/category/{id}', [CategoryController::class, 'destroy']);
Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->middleware(['auth', 'web'])->name('category.edit');

// Route::get('/api/component', [ComponentController::class, 'index']); 
// Route::post('/api/component', [ComponentController::class, 'store']); 
// Route::get('/api/component/{id}', [ComponentController::class, 'show']); 
// Route::put('/api/component/{id}', [ComponentController::class, 'update']); 
// Route::delete('/api/component/{id}', [ComponentController::class, 'destroy']);

Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->middleware(['auth', 'web'])->name('user.edit');
Route::put('/api/user/{id}', [UserController::class, 'update']);

Route::get('/blank', function () {
    return view('cms.blank', ['user' => Auth::user()]);
});

$pages = Page::all();
foreach ($pages as $page) {
    Route::view($page->url, 'front.custom', ['page' => Page::find($page->id), 'categories' => Category::all()]);
}
Route::get('/category/{id}',  [FrontController::class, 'category'])->name('category');
Route::get('/product/{id}',  [FrontController::class, 'product']);


require __DIR__ . '/auth.php';
