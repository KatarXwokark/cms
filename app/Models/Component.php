<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Component{
    public static function createNewComponent($id_page, $content){
        DB::insert('insert into Component(id_page, content) values(?, ?)', [$id_page, $content]);
        DB::commit();
    }
}