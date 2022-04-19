<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TimeControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TimeController extends Controller
{
    public function index(){
        $model = new TimeControl();
        $category = new Category();
        $datacat = $category->queryall();
        $data = $model->queryall();
        return view('timecontrollist',['data'=>$data, 'datacat' => $datacat]);
    }

    public function add(){
        $category = new Category();
        $datacat = $category->queryall();
        return view('timecontroladd',['datacat' => $datacat]);
    }

    public function insert(Request $request){
        foreach ($request->time_name as $key => $value) {
            $model = new TimeControl();
            $name = $request->time_name[$key];
            $time_initial = $request->time_initialtime[$key];
            $time_increment = $request->time_incrementtime[$key];
            $time_category = $request->category[$key];
            $model->queryadd($name,$time_initial,$time_increment,$time_category);
        }
        return redirect('/time');
    }

    public function update(Request $request){
        $model = new TimeControl();
        $model->queryupdate($request);
        return redirect('/time');
    }

    public function delete(Request $request){
        $model = new TimeControl();
        $delete = $model->querydelete($request->id);
        return redirect('/time');
    }
}
