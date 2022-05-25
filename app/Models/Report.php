<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    public function queryresult($request){
        $data = DB::select('SELECT
        v.id_Venue AS venueid, t.id_Tournament AS tourneyid, t.name AS tourneyname, t.prize AS prize
    FROM
        venues AS v LEFT JOIN countries AS c ON v.fk_Countryid_Country = c.id_Country LEFT JOIN tournaments as t ON v.id_Venue = t.fk_Venueid_Venue
    WHERE
        c.id_Country = :country AND
        t.prize > :prize
    ORDER BY
        v.id_Venue ASC,
        t.prize ASC
    ', ['country' => $request->country, 'prize' => $request->prize]);
        return $data;
    }

    public function venue($request){
        $data = DB::select('SELECT
        DISTINCT v.id_Venue,v.name
    FROM
        venues AS v LEFT JOIN countries AS c ON v.fk_Countryid_Country = c.id_Country LEFT JOIN tournaments as t ON v.id_Venue = t.fk_Venueid_Venue
    WHERE
        c.id_Country = :country AND
        t.prize > :prize
    ORDER BY
        v.id_Venue ASC,
        t.prize ASC
    ', ['country' => $request->country, 'prize' => $request->prize]);
        return $data;
    }

    public function country($request){
        $data = DB::select('SELECT
        DISTINCT c.name
    FROM
        venues AS v LEFT JOIN countries AS c ON v.fk_Countryid_Country = c.id_Country LEFT JOIN tournaments as t ON v.id_Venue = t.fk_Venueid_Venue
    WHERE
        c.id_Country = :country AND
        t.prize >= :prize
    ORDER BY
        v.id_Venue ASC,
        t.prize ASC
    ', ['country' => $request->country, 'prize' => $request->prize]);
        return $data;
    }

    public function total($request){
        $data = DB::select('SELECT
        SUM(t.prize) AS grandtotal
    FROM
        venues AS v LEFT JOIN countries AS c ON v.fk_Countryid_Country = c.id_Country LEFT JOIN tournaments as t ON v.id_Venue = t.fk_Venueid_Venue
    WHERE
        c.id_Country = :country AND
        t.prize > :prize
    ', ['country' => $request->country, 'prize' => $request->prize]);
        return $data;
    }

    public function numberoftournament($request){
        $data = DB::select('SELECT
        COUNT(t.id_Tournament) AS num
    FROM
        venues AS v LEFT JOIN countries AS c ON v.fk_Countryid_Country = c.id_Country LEFT JOIN tournaments as t ON v.id_Venue = t.fk_Venueid_Venue
    WHERE
        c.id_Country = :country AND
        t.prize > :prize
    ', ['country' => $request->country, 'prize' => $request->prize]);
        return $data;
    }
}

