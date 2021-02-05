<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Product{
    public static function getProducts($id_cat){
        return DB::select('select * from Product where id_cat = ?', [$id_cat]);
    }

    public static function getProduct($id){
        return DB::select('select * from Product where id = ?', [$id]);
    }

    public static function createProduct($id_cat, $name, $description, $price){
        DB::insert('insert into Product(id_cat, name, description, price, created_by, last_edited) values(?, ?, ?, ?, 3, CURRENT_TIMESTAMP)',
            [$id_cat, $name, $description, $price]);
    }

    public static function updateProduct($id, $name, $description, $price){
        DB::update('update Product set name = ?, description = ?, price = ?, created_by = 3, last_edited = CURRENT_TIMESTAMP where id = ?',
            [$name, $description, $price, $id]);
    }

    public static function deleteProduct($id){
        DB::delete('delete from Product where id = ?', [$id]);
    }
}