<?php

namespace App\Http\Controllers\admin\metro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MetroStation;

class StationController extends Controller{
	/**
	 * Display a listing of the Metro stations.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($line_id){
		$current_line = \App\MetroLine::findOrFail($line_id);
		$stations = MetroStation::where('metro_line_id', $line_id)->get();
		return view('admin.metro.station', ['stations' => $stations, 'current_line' => $current_line]);
	}

	/**
	 * Store a newly created metro station in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){
		$this->validate($request, [
			'name' => 'required',
			'line_id' => 'required|integer',
		]);

		$metro_station = new MetroStation;
		$metro_station->metro_line_id = $request->line_id;
		$metro_station->name = $request->name;
		$metro_station->save();

		return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New Metro Station!', 'position' => 'topRight']]);
	}

	/**
	 * Update the specified metro station in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){
		$metro_line = MetroLine::find($id);
		$metro_line->city_id = $request->city_id;
		$metro_line->name = $request->name;
		$metro_line->save();
		return back()->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'Metro Line changed!', 'position' => 'topRight']]);
	}

	/**
	 * Remove the specified metro station from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){
		// Delete all stations in it

		$metro_line = MetroLine::find($id);

		File::delete('storage/metro/' . $metro_line->image);

		$metro_line->delete();
		return;
	}
}
