<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(){
        $model = new Country();
        $data = $model->queryall();
        return view('countrylist',['data'=>$data]);
    }

    public function insert(Request $request){
        $model = new Country();
        $model->queryinsert($request->name,$request->capital);
        return redirect()->back();
    }

    public function update(Request $request){
        $model = new Country();
        $model->queryupdate($request->name,$request->capital,$request->id);
        return redirect()->back();
    }

    public function delete(Request $request){
        $model = new Country();
        $delete = $model->querydelete($request->id);
        return redirect()->back();
    }
}
