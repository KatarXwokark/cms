<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Page{

    public static function getAllPages(){
        return DB::select('select p.id as id, p.name as name, p.id_temp as name_temp, tag as language, url, username as author, last_edited 
            from Page p join Language l on l.id = p.id_lang
            join User u on u.id = p.created_by');
    }

    public static function getAllRawPages(){
        return DB::select('select * from Page');
    }

    public static function getPage($id){
        return DB::select('select * from Page where id = ?', [$id])[0];
    }

    public static function createNewPage($name, $id_temp, $id_lang, $url){
        DB::insert('insert into Page(id_temp, id_lang, name, url, created_by, last_edited) values
            (?, ?, ?, ?, 3, CURRENT_TIMESTAMP)', [$id_temp == '' ? null : $id_temp, $id_lang, $name, $url]);
        return DB::select('select * from Page where id_temp = ? and name = ?', [$id_temp, $name]);
    }

    public static function updatePage($id, $name, $id_temp, $id_lang, $url){
        DB::update('update Page 
            set name = ?, id_temp = ?, id_lang = ?, url = ?, created_by = 3, last_edited = CURRENT_TIMESTAMP
            where id = ?', [$name, $id_temp == '' ? null : $id_temp, $id_lang, $url, $id]);
    }

    public static function deletePage($id){
        $componentsToDelete = DB::select('select id from Component where id_page = ?', [$id]);
        foreach($componentsToDelete as $component){
            DB::delete('delete from Component where id = ?', [$component->id]);
        }
        DB::delete('delete from Page where id = ?', [$id]);
    }
}