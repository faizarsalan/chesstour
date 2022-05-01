<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index(){
        $model = new Player();
        $country = new Country();
        $data = $model->queryall();
        $countrydata = $country->queryall();
        return view('playerlist',['data'=>$data, 'country' => $countrydata]);
    }

    public function add(){
        $country = new Country();
        $countrydata = $country->queryall();
        return view('playeradd',['data'=>$countrydata]);
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
