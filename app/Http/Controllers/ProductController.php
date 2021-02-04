<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo var_dump($_POST);
        if(isset($_POST)){
            if(isset($_POST['create'])){
                Category::createCategory($_POST['id_cat'], $_POST['name']);
            }
            else if(isset($_POST['update'])){
                Category::updateCategory($_POST['id'], $_POST['id_cat'], $_POST['name']);
            }
            else if(isset($_POST['delete'])){
                Category::deleteCategory($_POST['id']);
            }
        }
        $categories = Category::getAllCategories();
        return view('product/index', ['categories' => $categories]);
    }

    public function create(){
        $categories = Category::getAllCategories();
        return view('product/update', ['categories' => $categories]);
    }

    public function update(){
        $categories = Category::getAllCategories();
        $category = Category::getCategory($_GET['id']);
        return view('product/update', ['edit_category' => $category, 'categories' => $categories]);
    }
}