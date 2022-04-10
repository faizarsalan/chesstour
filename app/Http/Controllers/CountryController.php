<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(){
        $country = new Country();
        $data = $country->queryall();
        return view('countrylist',['data'=>$data]);
    }

    public function insert(Request $request){
        $country = new Country();
        $country->queryinsert($request->name,$request->capital);
        return redirect()->back();
    }

    public function update(Request $request){
        $country = new Country();
        $country->queryupdate($request->name,$request->capital,$request->id);
        return redirect()->back();
    }

    public function delete(Request $request){
        $country = new Country();
        $delete = $country->querydelete($request->id);
        return redirect()->back();
    }
}
