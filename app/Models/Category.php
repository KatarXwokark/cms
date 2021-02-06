<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Category{

    public static function getAllMainCategories(){
        return DB::select('select * from Category where id_cat is null');
    }

    public static function getAllPossibleMajorCategories($id){
        $sub_categories = self::getAllSubCategories($id);
        $pstmt = 'select * from Category where not(';
        foreach($sub_categories as $sub_category){
            $pstmt .= "id = " . $sub_category->id . " or ";
        }
        $pstmt .= "id = " . $id .  ")";
        return DB::select($pstmt);
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

    private static function getAllSubCategories($id){
        $sub_categories = DB::select('select * from Category where id_cat = ?', [$id]);
        $deeper_sub_categories = array();
        foreach($sub_categories as $sub_category){
            $deeper_sub_categories = array_merge($deeper_sub_categories, self::getAllSubCategories($sub_category->id));
        }
        return array_merge($deeper_sub_categories, $sub_categories);
    }
}