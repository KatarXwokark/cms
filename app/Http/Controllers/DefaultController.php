<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Template;
use App\Models\Component;
use App\Models\Category;
use App\Models\Product;

class DefaultController extends Controller{

    public static function index($id){
        $page = Page::getPage($id);
        $template = Template::getTemplate($page->id_temp);
        $components = Component::getComponents($id);
        $categories = array();
        $products = array();
        foreach($components as $component){
            $main_category = Category::getCategory($component->id_cat);
            if(!is_null($main_category)){
                $categories[$component->id] = array_merge(array($main_category), Category::getAllSubCategories($component->id_cat));
                foreach($categories[$component->id] as $category){
                    $products[$category->id] = Product::getProducts($category->id);
                }
            }
        }
        return ['page' => $page, 'template' => $template, 'components' => $components,
            'categories' => $categories, 'products' => $products];
    }
}