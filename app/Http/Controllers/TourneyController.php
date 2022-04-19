<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\TimeControl;
use App\Models\Tourney;
use App\Models\Organizer;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourneyController extends Controller
{
    public function index(){
        $model = new Tourney();
        $datatc = new TimeControl();
        $dataorg = new Organizer();
        $datavenue =  new Venue();
        $data = $model->queryall();
        $tc = $datatc->queryall();
        $org = $dataorg->queryall();
        $venue = $datavenue->queryall();
        return view('tourneylist',['data'=>$data, 'tc' => $tc, 'org' => $org, 'venue' => $venue]);
    }

    public function add(){
        $model = new Country();
        $tc = new TimeControl();
        $org = new Organizer();
        $data = $model->queryall();
        $datatc = $tc->queryall();
        $dataorg = $org->queryall();
        return view('tourneyadd',['data' => $data, 'datatc' => $datatc, 'dataorg' => $dataorg]);
    }

    public function insert(Request $request){
        $venue = new Venue();
        $venue->queryinsert($request->venue,$request->country);
        $venueid = $venue->showid($request->venue);
        foreach ($venueid as $key => $value) {
            $venuekey = $value->id_Venue;
        }
        foreach ($request->tourney_name as $key => $value) {
            $model = new Tourney();
            $model->queryinsert($request->tourney_name[$key],$request->tourney_prize[$key],$venuekey,$request->organizer[$key],$request->timecontrol[$key]);
        }
        return redirect('/tourney');
    }

    public function update(Request $request){
        $model = new Tourney();
        $model->queryupdate($request);
        return redirect('/tourney');
    }

    public function delete(Request $request){
        $model = new Tourney();
        $delete = $model->querydelete($request->id);
        return redirect('/tourney');
    }
}
