<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Country;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        $country = new Country();
        $countrydata = $country->queryall();
        return view('reportindex', ['data' => $countrydata]);
    }

    public function query(Request $request){
        $report = new Report();
        $data = $report->queryresult($request);

        if ($data == NULL) return redirect('/report');

        $venue = $report->venue($request);
        $countryname = $report->country($request);
        foreach ($countryname as $item){
            $country = $item->name;
        }
        $total = $report->total($request);
        foreach ($total as $totalitem){
            $grandtotal = $totalitem->grandtotal;
        }
        $totalnum = $report->numberoftournament($request);
        foreach ($totalnum as $totalnumitem) {
            $num = $totalnumitem->num;
        }
        return view('reportviewer',['data'=>$data, 'venue'=>$venue, 'countryname' => $country, 'total' => $grandtotal, 'number' => $num]);
    }

    public function insert(Request $request){
        $country = new Country();
        $country->queryinsert($request->country_name,$request->country_capital);
        foreach ($request->player_Firstname as $key => $value) {
            $model = new Player();
            $model->queryinsert($request->player_Firstname[$key],$request->player_Surname[$key],$request->player_Elo[$key],$request->player_Title[$key],$request->player_DOB[$key],$request->player_Gender[$key],$request->country);
        }
        return redirect('/player');
    }

    public function update(Request $request){
        $model = new Player();
        $model->queryupdate($request);
        return redirect('/player');
    }

    public function delete(Request $request){
        $model = new Player();
        $delete = $model->querydelete($request->id);
        return redirect('/player');
    }
}
