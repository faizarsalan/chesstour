<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tourney extends Model
{
    use HasFactory;

    public function queryall(){
        $data = DB::select('SELECT t.name, t.prize, t.id_Tournament, v.name as venuename, o.name as orgname, c.name as tcname FROM tournaments AS t JOIN venues AS v ON t.fk_Venueid_Venue = v.id_Venue JOIN organizers AS o on t.fk_Organizerid_Organizer = o.id_Organizer JOIN time_controls AS c ON t.fk_Time_Controlid_Time_Control = c.id_Time_Control');
        return $data;
    }

    public function queryinsert($name,$prize,$venue,$org,$timecontrol){
        DB::insert('INSERT into tournaments (name,prize,fk_Venueid_Venue,fk_Organizerid_Organizer,fk_Time_Controlid_Time_Control) values (:name,:prize,:venue,:org,:timecontrol)',
                                                                                                              ['name' => $name,
                                                                                                               'prize' => $prize,
                                                                                                               'venue' => $venue,
                                                                                                               'org' => $org,
                                                                                                               'timecontrol' => $timecontrol]);
    }

    public function queryupdate($name,$prize,$organizer,$timecontrol,$id){
        DB::update('UPDATE tournaments SET name = :name, prize = :prize, fk_Organizerid_Organizer = :org, fk_Time_Controlid_Time_Control = :timecontrol where id_Tournament = :id',
                                                                                                                ['name' => $name,
                                                                                                                'prize' => $prize,
                                                                                                                'org' => $organizer,
                                                                                                                'timecontrol' => $timecontrol,
                                                                                                                'id' => $id]);
    }

    public function querydelete($id){
        DB::delete('DELETE FROM tournaments where id_Tournament = :id', ['id' => $id]);
    }

    public function queryone($id){
        $data = DB::select('SELECT t.name, t.prize, t.id_Tournament, o.name as orgname, c.name as tcname FROM tournaments AS t JOIN organizers AS o on t.fk_Organizerid_Organizer = o.id_Organizer JOIN time_controls AS c ON t.fk_Time_Controlid_Time_Control = c.id_Time_Control WHERE fk_Venueid_Venue = :id',['id' => $id]);
        return $data;
    }
}
