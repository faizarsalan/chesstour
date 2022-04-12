<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index(){
        $model = new Player();
        $data = $model->queryall();
        return view('playerlist',['data'=>$data]);
    }

    public function insert(Request $request){
        $model = new Player();
        $model->queryinsert($request->name,$request->capital);
        return redirect()->back();
    }

    public function update(Request $request){
        $model = new Player();
        $model->queryupdate($request->name,$request->capital,$request->id);
        return redirect()->back();
    }

    public function delete(Request $request){
        $model = new Player();
        $delete = $model->querydelete($request->id);
        return redirect()->back();
    }
}
