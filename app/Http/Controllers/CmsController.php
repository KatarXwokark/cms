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
use Illuminate\Support\Facades\Auth;

class CmsController extends Controller
{
    public function templates()
    {
        return view('cms.templates', ['templates' => Template::all(), 'user' => Auth::user()]);
    }

    public function profile()
    {
        return view('cms.profile', ['templates' => Template::all(), 'user' => Auth::user()]);
    }

    public function categories()
    {
        return view('cms.categories', ['categories' => Category::all(), 'user' => Auth::user()]);
    }

    public function products()
    {
        
        return view('cms.products', ['products' => Product::all(), 'categories' => Category::all(), 'user' => Auth::user()]);
    }

    public function components()
    {
        return view('cms.components', ['components' => Component::all(), 'user' => Auth::user()]);
    }

    public function pages()
    {
        return view('cms.pages', ['pages' => Page::all(), 'user' => Auth::user(), 'templates' => Template::all()]);
    }

    public function languages()
    {
        return view('cms.languages', ['languages' => Language::all(), 'user' => Auth::user()]);
    }

    public function users()
    {
        if(Auth::user()->userType > 1)
            return view('cms.users', ['users' => User::all(), 'user' => Auth::user()]);
        else
            return redirect()->route('login');
    }

    public function custom($id)
    {
        return view('cms.custom', ['users' => User::all(), 'user' => Auth::user()]);
    }
}
