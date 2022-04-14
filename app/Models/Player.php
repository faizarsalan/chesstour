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

    public function queryupdate($request){
        DB::update('UPDATE players SET firstname = :firstname, surname = :surname, elo = :elo, title = :title, dateofbirth = :dateofbirth , gender = :gender, fk_Countryid_Country =  :country where id_Player = :id',
                                                                                                              ['firstname' => $request->firstname,
                                                                                                               'surname' => $request->surname,
                                                                                                               'elo' => $request->elo,
                                                                                                               'title' => $request->title,
                                                                                                               'dateofbirth' => $request->dateofbirth,
                                                                                                               'gender' => $request->gender,
                                                                                                               'country' => $request->country,
                                                                                                               'id' => $request->id]);
    }

    public function querydelete($id){
        DB::delete('DELETE FROM players where id_Player = :id', ['id' => $id]);
    }
}
