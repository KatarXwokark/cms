<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Template;

class TemplateController extends Controller
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
                Template::createTemplate($_POST['name'], $_POST['footer'], $_POST['header']);
            }
            else if(isset($_POST['update'])){
                Template::updateTemplate($_POST['id'], $_POST['name'], $_POST['footer'], $_POST['header']);
            }
            else if(isset($_POST['delete'])){
                Template::deleteTemplate($_POST['id']);
            }
        }
        $templates = Template::getAllTemplates();
        return view('template/index', ['templates' => $templates]);
    }

    public function create(){
        return view('template/update');
    }

    public function update(){
        $template = Template::getTemplate($_GET['id']);
        return view('template/update', ['template' => $template]);
    }
}