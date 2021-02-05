<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Category{

    public static function getAllMainCategories(){
        return DB::select('select * from Category where id_cat is null');
    }

    public static function getAllCategories(){
        return DB::select('select * from Category');
    }

    public static function getCategory($id){
        return DB::select('select * from Category where id = ?', [$id])[0];
    }

    public static function createCategory($id_cat, $name){
        return DB::insert('insert into Category(id_cat, name) values(?, ?)', [$id_cat == "" ? null : $id_cat, $name]);
    }

    public static function updateCategory($id, $id_cat, $name){
        return DB::update('update Category set id_cat = ?, name = ? where id = ?', [$id_cat == "" ? null : $id_cat, $name, $id]);
    }  

    public static function deleteCategory($id){
        return DB::delete('delete from Category where id = ?', [$id]);
    }  
}