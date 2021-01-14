<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Template;
use App\Models\Language;
use App\Models\Component;

class MainController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //echo var_dump($_GET);
        //echo var_dump($_POST);
        if(isset($_GET)){
            if(isset($_GET['create'])){
                $id_page = Page::createNewPage($_GET['name'], $_GET['temp_name'], $_GET['language'], $_GET['url']);
                foreach($_GET['comp'] as $component)
                    Component::createNewComponent($id_page[0]->id, $component);
            }
            else if(isset($_GET['update'])){
                
            }
        }
        $pages = Page::getAllPages();
        return view('index', ['pages' => $pages]);
    }

    public function create(){
        $languages = Language::getAllLanguages();
        $templates = Template::getAllTemplates();
        return view('update', ['templates' => $templates, 'languages' => $languages]);
    }

    public function update(){
        $languages = Language::getAllLanguages();
        $templates = Template::getAllTemplates();
        $page = Page::getPage($_GET['id']);
        return view('update', ['templates' => $templates, 'languages' => $languages, 'page' => $page]);
    }
}