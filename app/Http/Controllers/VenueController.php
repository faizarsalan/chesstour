<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(){
        $model = new Venue();
        $data = $model->queryall();
        return view('countrylist',['data'=>$data]);
    }

    public function add(){
        return view('countryadd');
    }

    public function insert(Request $request){
        foreach ($request->country_name as $key => $value) {
            $model = new Country();
            $model->queryinsert($request->country_name[$key],$request->country_capital[$key]);
        }
        return redirect('/country');
    }

    public function update(Request $request){
        $model = new Country();
        $model->queryupdate($request->name,$request->capital,$request->id);
        return redirect('/country');
    }

    public function delete(Request $request){
        $model = new Country();
        $delete = $model->querydelete($request->id);
        return redirect('/country');
    }
}
