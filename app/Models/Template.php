<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Template{

    public static function getAllTemplates(){
        return DB::select('select * from Template');
    }

    public static function getTemplate($id){
        return DB::select('select * from Template where id = ?', [$id])[0];
    }

    public static function createNewTemplate($name, $header, $footer){
        DB::insert('insert into Template(name, header, footer) values (?, ?, ?)', [$name, $header, $footer]);
    }

    public static function updateTemplate($id, $name, $header, $footer){
        DB::update('update Template set name = ?, header = ?, footer = ? where id = ?', [$name, $header, $footer, $id]);
    }
}