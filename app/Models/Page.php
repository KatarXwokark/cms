<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Page{

    public static function getAllPages(){
        return DB::select('select p.id as id, p.name as name, t.name as name_temp, tag as language, url, username as author, last_edited 
            from Page p join Template t on t.id = p.id_temp
            join Language l on l.id = p.id_lang
            join User u on u.id = p.created_by');
    }

    public static function createNewPage($name, $id_temp, $id_lang, $url){
        DB::insert('insert into Page(id_temp, id_lang, name, url, created_by, last_edited) values
            (?, ?, ?, ?, 3, CURRENT_TIMESTAMP)', [$id_temp, $id_lang, $name, $url]);
        DB::commit();
        return DB::select('select * from Page where id_temp = ? and name = ?', [$id_temp, $name]);
    }
}