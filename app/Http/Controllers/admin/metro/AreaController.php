<?php

namespace App\Http\Controllers\admin\metro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MetroArea;

class AreaController extends Controller{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		$areas = MetroArea::select(['id', 'name'])->get();
		return view('admin.metro.area.area', ['areas' => $areas]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){
		$this->validate($request, [
			'name' => 'required',
            'description' => 'nullable|string|max:10000',
		]);

        $area = new MetroArea;
        $area->name = $request->name;
        $area->description = $request->description;
        $area->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New area created!', 'position' => 'topRight']]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){
        $area = MetroArea::findOrFail($id);
        $area->name = $request->name;
        $area->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'Area name changed!', 'position' => 'topRight']]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){
		// TODO: Delete all panels in it.
		$area = MetroArea::findOrFail($id);
        $area->delete();
        return;
	}
}
