<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Template{

    public static function getAllTemplates(){
        return DB::select('select * from Template');
    }
}