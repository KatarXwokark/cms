<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PageController;
use App\Models\Page;
use App\Models\Component;
use App\Models\Template;

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

Route::any('/cms', array('uses' => 'App\Http\Controllers\PageController@index', 'as' => 'page.index'));
Route::get('/cms/create', array('uses' => 'App\Http\Controllers\PageController@create', 'as' => 'page.create'));
Route::any('/cms/update', array('uses' => 'App\Http\Controllers\PageController@update', 'as' => 'page.update'));

Route::any('/cms/template', array('uses' => 'App\Http\Controllers\TemplateController@index', 'as' => 'template.index'));
Route::get('/cms/template/create', array('uses' => 'App\Http\Controllers\TemplateController@create', 'as' => 'template.create'));
Route::get('/cms/template/update', array('uses' => 'App\Http\Controllers\TemplateController@update', 'as' => 'template.update'));

Route::any('/cms/product', array('uses' => 'App\Http\Controllers\ProductController@index', 'as' => 'product.index'));
Route::get('/cms/product/create', array('uses' => 'App\Http\Controllers\ProductController@create', 'as' => 'product.create'));
Route::any('/cms/product/update', array('uses' => 'App\Http\Controllers\ProductController@update', 'as' => 'product.update'));
Route::get('/cms/product/update/create', array('uses' => 'App\Http\Controllers\ProductController@createOne', 'as' => 'product.createOne'));
Route::get('/cms/product/update/update', array('uses' => 'App\Http\Controllers\ProductController@updateOne', 'as' => 'product.updateOne'));

$pages = Page::getAllRawPages();
foreach($pages as $page){
    $components = Component::getComponents($page->id); 
    if($page->id_temp != null){
        $template = Template::getTemplate($page->id_temp);
        Route::view($page->url, 'page', ['page' => $page, 'components' => $components, 'template' => $template]);
    }
    else
        Route::view($page->url, 'page', ['page' => $page, 'components' => $components]);
}



