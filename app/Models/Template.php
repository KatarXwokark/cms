<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Template{

    public static function getAllTemplates(){
        return DB::select('select * from Template');
    }

    public static function getTemplate($id){
        $tmp = DB::select('select * from Template where id = ?', [$id]);
        if($tmp !== array())
            return $tmp[0];
        else
            return null;
    }

    public static function createTemplate($name, $header, $footer){
        DB::insert('insert into Template(name, header, footer) values (?, ?, ?)', [$name, $header, $footer]);
    }

    public static function updateTemplate($id, $name, $header, $footer){
        DB::update('update Template set name = ?, header = ?, footer = ? where id = ?', [$name, $header, $footer, $id]);
    }

    public static function deleteTemplate($id){
        $pages = DB::select('select id from Page where id_temp = ?', [$id]);
        foreach($pages as $page)
            DB::update('update Page set id_temp = NULL where id = ?', [$page->id]);
        DB::delete('delete from Template where id = ?', [$id]);
    }
}