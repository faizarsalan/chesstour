<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(){
        $data = DB::select('SELECT * FROM countries');
        // dump($data);
        return view('countrylist', 
        compact('data'));
    }

    public function create(){
        //returns the insert form
    }

    public function insert(Request $request){
        // $data = new Country();
        DB::insert('INSERT into countries (name) values (:name)', ['name' => $request->name]);
        //redirect to index
    }

    public function edit()
    {
        //returns the update form
    }

    public function update(Request $request){
        DB::update('UPDATE countries set name = :name where name = :id', ['name' => $request->name, 'id' => $request->id]);
        //redirect to index
    }

    public function delete(Request $request){
        DB::delete('DELETE countries where id = :id', ['id' => $request->id]);
        // redirect to index
    }


}
