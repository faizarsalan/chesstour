<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function queryall(){
        $data = DB::select('SELECT v.name, v.id_Venue, c.name as countryname FROM venues AS v JOIN countries AS c ON v.fk_Countryid_Country = c.id_Country');
        return $data;
    }

    public function queryinsert($name,$country){
        DB::insert('INSERT into venues (name,fk_Countryid_Country) values (:name,:country)', ['name' => $name,
                                                                                               'country' => $country]);
    }

    public function queryupdate($Request){
        DB::update('UPDATE venues SET name = :name, fk_Countryid_Country = :country where id_Venue = :id', ['name' => $name,
                                                                                                               'fk_Countryid_Country' => $country,
                                                                                                               'id' => $id]);
    }

    public function querydelete($id){
        DB::delete('DELETE FROM venues where id_Venue = :id', ['id' => $id]);
    }

    public function showid($name){
        $id = DB::select('SELECT id_Venue FROM venues WHERE name = :name',['name' => $name]);
        return $id;
    }

    public function queryone($id){
        $data = DB::select('SELECT * FROM venues WHERE id_Venue = :id',['id' => $id]);
        return $data;
    }
}

