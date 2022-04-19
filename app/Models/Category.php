<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    public function queryall(){
        $data = DB::select('SELECT * FROM categories');
        return $data;
    }

    public function queryinsert($name){
        DB::insert('INSERT into categories (name) values (:name)', ['name' => $name]);
    }

    public function queryupdate($request){
        DB::update('UPDATE categories SET name = :name where id_Category = :id', ['name' => $request->name, 'id' => $request->id]);
    }

    public function querydelete($id){
        DB::delete('DELETE FROM categories where id_Category = :id', ['id' => $id]);
    }
}
