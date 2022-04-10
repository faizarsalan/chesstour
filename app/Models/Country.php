<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function queryall(){
        $data = DB::select('SELECT * FROM countries'); 
        return $data;
    }

    public function queryinsert($countryname,$capitalname){
        DB::insert('INSERT into countries (name,capital) values (:countryname,:capitalname)', ['countryname' => $countryname, 
                                                                                               'capitalname' => $capitalname]);
    }

    public function queryupdate($countryname,$capitalname,$id){
        DB::update('UPDATE countries SET name = :countryname, capital = :capitalname where id_Country = :id', ['countryname' => $countryname, 
                                                                                                               'capitalname' => $capitalname,
                                                                                                               'id' => $id]);
    }

    public function querydelete($id){
        DB::delete('DELETE FROM countries where id_Country = :id', ['id' => $id]);
    }
}
