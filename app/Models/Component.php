<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Component{
    public static function createNewComponent($id_page, $content){
        DB::insert('insert into Component(id_page, content) values(?, ?)', [$id_page, $content]);
        DB::commit();
    }

    public static function getComponents($id){
        return DB::select('select * from Component where id_page = ?', [$id]);
    }

    public static function maxComponentId(){
        return DB::select('select max(id) as maximum from Component')[0];
    }
}