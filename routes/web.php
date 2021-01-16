<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MainController;
use App\Models\Page;

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

Route::get('/dbtest', [TestController::class, 'dbtest']);
Route::any('/cms', array('uses' => 'App\Http\Controllers\MainController@index', 'as' => 'page.index'));
Route::get('/cms/create', array('uses' => 'App\Http\Controllers\MainController@create', 'as' => 'page.create'));
Route::get('/cms/update', array('uses' => 'App\Http\Controllers\MainController@update', 'as' => 'page.update'));
$pages = Page::getAllPages();
foreach($pages as $page)
    Route::any($page->url, [TestController::class, 'dbtest']);

