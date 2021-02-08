<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PageController;
use App\Models\Page;
use App\Models\Component;
use App\Models\Template;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('cms.login');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', function () {
    return view('cms.profile');
});

Route::get('/templates', function () {
    return view('cms.templates');
});

Route::get('/pages', function () {
    return view('cms.pages');
});

Route::get('/products', function () {
    return view('cms.products');
});

Route::get('/new-register', function () {
    return view('cms.register');
});

Route::get('/new-login', function () {
    return view('cms.login');
});


Route::any('/cms', array('uses' => 'App\Http\Controllers\PageController@index', 'as' => 'page.index'));
Route::get('/cms/create', array('uses' => 'App\Http\Controllers\PageController@create', 'as' => 'page.create'));
Route::get('/cms/update', array('uses' => 'App\Http\Controllers\PageController@update', 'as' => 'page.update'));

Route::any('/cms/template', array('uses' => 'App\Http\Controllers\TemplateController@index', 'as' => 'template.index'));
Route::get('/cms/template/create', array('uses' => 'App\Http\Controllers\TemplateController@create', 'as' => 'template.create'));
Route::get('/cms/template/update', array('uses' => 'App\Http\Controllers\TemplateController@update', 'as' => 'template.update'));

$pages = Page::getAllRawPages();
foreach($pages as $page){
    $components = Component::getComponents($page->id); 
    $template = Template::getTemplate($page->id_temp);
    Route::view($page->url, 'page', ['page' => $page, 'components' => $components, 'template' => $template]);
}


require __DIR__.'/auth.php';