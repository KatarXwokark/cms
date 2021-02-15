<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Template;
use Exception;

class CmsController extends Controller
{
    public function templates()
    {
        return view('cms.templates', ['templates' => Template::all()]);
    }

    public function profile()
    {
        return view('cms.profile');
    }

    public function categories()
    {
        return view('cms.categories');
    }

    public function products()
    {
        return view('cms.products');
    }

    public function components()
    {
        return view('cms.components');
    }

    public function pages()
    {
        return view('cms.pages', );
    }

    public function languages()
    {
        return view('cms.languages', );
    }

    public function users()
    {
        return view('cms.users', );
    }
}
