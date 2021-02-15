<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Language;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Template;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Lang;

class CmsController extends Controller
{
    public function templates()
    {
        return view('cms.templates', ['templates' => Template::all()]);
    }

    public function profile()
    {
        return view('cms.profile', ['templates' => Template::all()]);
    }

    public function categories()
    {
        return view('cms.categories', ['categories' => Category::all()]);
    }

    public function products()
    {
        return view('cms.products', ['products' => Product::all()]);
    }

    public function components()
    {
        return view('cms.components', ['components' => Component::all()]);
    }

    public function pages()
    {
        return view('cms.pages', ['pages' => Page::all()]);
    }

    public function languages()
    {
        return view('cms.languages', ['languages' => Language::all()]);
    }

    public function users()
    {
        return view('cms.users', ['users' => User::all()]);
    }
}
