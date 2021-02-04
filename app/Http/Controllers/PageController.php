<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Template;
use App\Models\Language;
use App\Models\Component;
use App\Models\Category;

class PageController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //echo var_dump($_GET);
        echo var_dump($_POST);
        if(isset($_POST)){
            if(isset($_POST['create'])){
                $id_page = Page::createNewPage($_POST['name'], $_POST['temp_name'], $_POST['language'], $_POST['url']);
                if(isset($_POST['comp'])){
                    foreach($_POST['comp'] as $component)
                        Component::createNewComponent($id_page[0]->id, $component);
                }
            }
            else if(isset($_POST['update'])){
                $id_page = Page::updatePage($_POST['id'], $_POST['name'], $_POST['temp_name'], $_POST['language'], $_POST['url']);
                if(isset($_POST['comp'])){
                    foreach($_POST['comp'] as $i => $component){
                        if(Component::getComponent($i) !== array())
                            Component::updateComponent($i, $component);
                        else
                            Component::createNewComponent($_POST['id'], $component);
                    }
                }
                if(isset($_POST['comp_del'])){
                    foreach($_POST['comp_del'] as $i => $to_delete){
                        if($to_delete)
                            Component::deleteComponent($i);
                    }
                }
            }
            else if(isset($_POST['delete']))
                Page::deletePage($_POST['id']);
        }
        $pages = Page::getAllPages();
        return view('page/index', ['pages' => $pages]);
    }

    public function create(){
        $languages = Language::getAllLanguages();
        $templates = Template::getAllTemplates();
        return view('page/update', ['templates' => $templates, 'languages' => $languages]);
    }

    public function update(){
        $languages = Language::getAllLanguages();
        $templates = Template::getAllTemplates();
        $categories = Category::getAllMainCategories();
        $page = Page::getPage($_GET['id']);
        $components = Component::getComponents($_GET['id']);
        $maximum = Component::maxComponentId()->maximum;
        return view('page/update', ['templates' => $templates, 'languages' => $languages, 
            'page' => $page, 'components' => $components, 'categories' => $categories, 'maximum' => $maximum]);
    }
}