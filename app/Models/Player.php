<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{
    use HasFactory;

    public function queryall(){
        $data = DB::select('SELECT p.firstname, p.surname, p.elo, p.title, p.dateofbirth, p.gender, p.id_player, c.name FROM players AS p JOIN countries AS c ON p.fk_Countryid_Country = c.id_Country'); 
        return $data;
    }

    public function queryinsert($countryname,$capitalname){
        DB::insert('INSERT into players (firstname,surname,elo,title,dateofbirth,gender,fk_Countryid_Country) values (:countryname,:capitalname)', ['countryname' => $countryname, 
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
