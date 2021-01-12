<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;

class MainController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::getAllPages();
        return view('index', ['pages' => $pages]);
    }
}