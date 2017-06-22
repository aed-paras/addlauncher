<?php

namespace App\Http\Controllers\admin\metro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\MetroLine;

class LineController extends Controller{
    /**
     * Display a listing of the Metro lines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($city_id){
        $city = \App\MetroCity::findOrFail($city_id);
        $lines = MetroLine::select(['id', 'name'])->where('metro_city_id', $city_id)->get();
        return view('admin.metro.line.line', ['lines' => $lines, 'city' => $city]);
    }

    /**
     * Store a newly created metro line in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'city_id' => 'required|integer',
            'description' => 'string',
        ]);

        $metro_line = new MetroLine;
        $metro_line->metro_city_id = $request->city_id;
        $metro_line->name = $request->name;
        $metro_line->description = $request->description;
        $metro_line->save();

        return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New Metro Line!', 'position' => 'topRight']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $line = MetroLine::findOrFail($id);
        $cities = \App\MetroCity::all();
        return view('admin.metro.line.edit', ['line' => $line, 'cities' => $cities]);
    }

    /**
     * Update the specified metro line in storage.
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
     * Remove the specified metro line from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        // Delete all stations in it

        $metro_line = MetroLine::find($id);

        $metro_line->delete();
        return;
    }


    // AJAX Communication

    public function description($id){
        $line = MetroLine::findOrFail($id);
        return $line->description;
    }


}
