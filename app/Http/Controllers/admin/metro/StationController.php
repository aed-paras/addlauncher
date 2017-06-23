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
		$line = \App\MetroLine::findOrFail($line_id);
		$stations = MetroStation::select(['id', 'name'])->where('metro_line_id', $line_id)->get();
		return view('admin.metro.station.station', ['stations' => $stations, 'line' => $line]);
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
            'description' => 'nullable|string|max:10000',
		]);

		$metro_station = new MetroStation;
		$metro_station->metro_line_id = $request->line_id;
		$metro_station->name = $request->name;
        $metro_station->description = $request->description;
		$metro_station->save();

		return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New Metro Station!', 'position' => 'topRight']]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $station = MetroStation::findOrFail($id);

        return view('admin.metro.station.edit', ['station' => $station]);
    }

	/**
	 * Update the specified metro station in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){
		$metro_station = MetroStation::find($id);
		$metro_station->name = $request->name;
		$metro_station->description = $request->description;
		$metro_station->save();
		return redirect('admin/metro/station/'.$request->line_id)->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'Metro Station changed!', 'position' => 'topRight']]);
	}	

	/**
	 * Remove the specified metro station from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){
		// TODO: Delete all Panels in it

		$metro_station = MetroStation::find($id);

		$metro_station->delete();
		return;
	}


    // AJAX Communication

    public function description($id){
        $station = MetroStation::findOrFail($id);
        return $station->description;
    }

}
