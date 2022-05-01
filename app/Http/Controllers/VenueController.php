<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Venue;
use App\Models\Tourney;
use App\Models\Organizer;
use App\Models\TimeControl;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenueController extends Controller
{
    public function index(){
        $model = new Venue();
        $data = $model->queryall();
        return view('tourneylist',['data'=>$data]);
    }

    public function add(){
        return view('tourneyadd');
    }

    public function insert(Request $request){
        foreach ($request->country_name as $key => $value) {
            $model = new Country();
            $model->queryinsert($request->country_name[$key],$request->country_capital[$key]);
        }
        return redirect('/venue');
    }

    public function update(Request $request){
        $model = new Country();
        $model->queryupdate($request->name,$request->capital,$request->id);
        return redirect('/venue');
    }

    public function edit(Request $request){
        $venuedata = new Venue();
        $venue = $venuedata->queryone($request->id);
        foreach ($venue as $key) {
            $venuename = $key->name;
            $venueid = $key -> id_Venue;
        }

        $tourneydata = new Tourney();
        $tourney = $tourneydata->queryone($request->id);
        $datatc = new TimeControl();
        $tc = $datatc->queryall();
        $dataorg = new Organizer();
        $org = $dataorg->queryall();
        // dd($tourneydata->queryone($request->id));
        return view('venueedit',['tourney' => $tourney, 'venue' => $venuename,'venueid' => $venueid,'tc' => $tc,'org' => $org]);
    }

    public function delete(Request $request){
        $model = new Venue();
        $delete = $model->querydelete($request->id);
        return redirect('/venue');
    }
}
