<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index(){
        $model = new Category();
        $data = $model->queryall();
        return view('categorylist',['data'=>$data]);
    }

    public function add(){
        return view('categoryadd');
    }

    public function insert(Request $request){
        foreach ($request->category_name as $key => $value) {
            $model = new Category();
            $model->queryinsert($request->category_name[$key]);
        }
        return redirect('/category');
    }

    public function update(Request $request){
        $model = new Category();
        $model->queryupdate($request);
        return redirect('/category');
    }

    public function delete(Request $request){
        $model = new Category();
        $delete = $model->querydelete($request->id);
        return redirect('/category');
    }
}
