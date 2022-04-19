<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TimeControl extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function queryall(){
        $data = DB::select('SELECT t.id_Time_Control, t.initialtime, t.incrementtime, t.name, c.name as categoryname FROM time_controls as t JOIN categories as c ON t.fk_Categoryid_Category = c.id_Category ORDER BY t.id_Time_Control');
        return $data;
    }

    public function queryadd($name,$initialtime,$incrementtime,$category){
        DB::insert('INSERT into time_controls (name,initialtime,incrementtime,fk_Categoryid_Category) values (:name,:initialtime,:incrementtime,:category)',
                                                                                              ['name' => $name,
                                                                                               'initialtime' => $initialtime,
                                                                                               'incrementtime' => $incrementtime,
                                                                                               'category' => $category]);
    }

    public function queryupdate($request){
        DB::update('UPDATE time_controls SET name = :name, initialtime = :initialtime, incrementtime = :incrementtime, fk_Categoryid_Category = :category where id_Time_Control = :id',
                                                                                                                    ['name' => $request->name,
                                                                                                                    'initialtime' => $request->initialtime,
                                                                                                                    'incrementtime' => $request->incrementtime,
                                                                                                                    'category' => $request->category,
                                                                                                                    'id' => $request->id]);
    }

    public function querydelete($id){
        DB::delete('DELETE FROM time_controls where id_Time_Control = :id', ['id' => $id]);
    }
}
