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

}