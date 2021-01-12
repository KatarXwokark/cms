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
}