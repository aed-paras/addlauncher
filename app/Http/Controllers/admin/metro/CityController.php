<?php

namespace App\Http\Controllers\admin\metro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MetroCity;

class CityController extends Controller{

    public function index(){
        $cities = MetroCity::all();
        return view('admin.metro.city.city', ['cities' => $cities]);
    }

    public function store(Request $request){
        $city = new MetroCity;
        $city->name = $request->name;
        $city->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New city created!', 'position' => 'topRight']]);
    }

    public function update(Request $request, $id){
        $city = MetroCity::findOrFail($id);
        $city->name = $request->name;
        $city->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'City name changed!', 'position' => 'topRight']]);
    }

    public function hide($id){
        $city = MetroCity::find($id);
        $city->delete();
        return;
    }

    public function destroy($id){
        // TODO: Delete all lines in it.
        $city = MetroCity::find($id);
        $city->delete();
        return;
    }
}
