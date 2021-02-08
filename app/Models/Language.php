<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Language{

    public static function getAllLanguages(){
        return DB::select('select * from Language');
    }
}