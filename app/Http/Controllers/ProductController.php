<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

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
        echo var_dump($_POST);
        if(isset($_POST)){
            if(isset($_POST['create'])){
                Product::createProduct($_POST['id_cat'], $_POST['name'], $_POST['description'], $_POST['price']);
            }
            else if(isset($_POST['update'])){
                Product::updateProduct($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price']);
            }
            else if(isset($_POST['delete'])){
                Product::deleteProduct($_POST['id']);
            }
        }
        $categories = Category::getAllPossibleMajorCategories(isset($_GET['id']) ? $_GET['id'] : $_POST['id_cat']);
        $category = Category::getCategory(isset($_GET['id']) ? $_GET['id'] : $_POST['id_cat']);
        $products = Product::getProducts(isset($_GET['id']) ? $_GET['id'] : $_POST['id_cat']);
        return view('product/update', ['edit_category' => $category, 'categories' => $categories, 'products' => $products]);
    }

    public function createOne(){
        return view('product/updateOne', ['id_cat' => $_GET['id_cat']]);
    }

    public function updateOne(){
        $product = Product::getProduct($_GET['id']);
        return view('product/updateOne', ['id_cat' => $_GET['id_cat'], 'product' => $product]);
    }
}