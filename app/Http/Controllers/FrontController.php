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

class FrontController extends Controller
{
    public function product($id)
    {
        return view('front.product', ['product' => Product::find($id), 'categories' => Category::all()]);
    }

    public function category($id)
    {
        $products = Product::where('id_cat', $id)->get();;
        return view('front.category', ['products' => $products, 'categories' => Category::all()]);
    }
}
