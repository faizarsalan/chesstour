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

    public function insert(Request $request){
        $model = new Player();
        $model->queryinsert($request->name,$request->capital);
        return redirect()->back();
    }

    public function update(Request $request){
        $model = new Player();
        $model->queryupdate($request);
        return redirect()->back();
    }

    public function delete(Request $request){
        $model = new Player();
        $delete = $model->querydelete($request->id);
        return redirect()->back();
    }
}
