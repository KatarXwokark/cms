<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Component{
    public static function createNewComponent($id_page, $id_cat, $content){
        DB::insert('insert into Component(id_page, id_cat, content) values(?, ?, ?)', 
            [$id_page, $id_cat == "" ? null : $id_cat, $content]);
    }

    public static function updateComponent($id, $id_cat, $content){
        DB::update('update Component set id_cat = ?, content = ? where id = ?', 
            [$id_cat == "" ? null : $id_cat, $content, $id]);
    }

    public static function getComponents($id){
        $tmp =  DB::select('select c.id as id, c.id_page as page, c.id_cat as id_cat, c.content as content, i.path as path from 
            Component c join ComponentImage ci on c.id = ci.id_comp join Image i on ci.id_img = i.id 
            where id_page = ?', [$id]);
        if($tmp !== array())
            return $tmp;
        else
            return DB::select('select * from Component where id_page = ?', [$id]);
    }

    public static function getComponent($id){
        return DB::select('select * from Component where id = ?', [$id]);
    }

    public static function maxComponentId(){
        return DB::select('select max(id) as maximum from Component')[0];
    }

    public static function deleteComponent($id){
        DB::delete('delete from Component where id = ?', [$id]);
    }

    public static function addImage($id, $name, $tmp_name){
        $path = '../resources/img/' . basename($name);
        if(!file_exists($path)){
            move_uploaded_file($tmp_name, $path);
        }
        DB::delete('delete from ComponentImage where id_comp = ?', [$id]);
        DB::insert('insert into Image(path) values(?)', [$path]);
        $new_img = DB::select('select * from Image where path = ?', [$path])[0];
        DB::insert('insert into ComponentImage(id_comp, id_img) values(?, ?)', [$id, $new_img->id]);
    }

}