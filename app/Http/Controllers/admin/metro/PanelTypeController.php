<?php

namespace App\Http\Controllers\admin\metro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MetroPanelType;

class PanelTypeController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
		$panel_types = MetroPanelType::all();
		return view('admin.metro.panel_type', ['panel_types' => $panel_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $panel_type = new MetroPanelType;
        $panel_type->name = $request->name;
        $panel_type->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New panel type created!', 'position' => 'topRight']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $panel_type = MetroPanelType::findOrFail($id);
        $panel_type->name = $request->name;
        $panel_type->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'Panel type name changed!', 'position' => 'topRight']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
		// TODO: Delete all panels in it.
		$panel_type = MetroPanelType::findOrFail($id);
        $panel_type->delete();
        return;
    }
}
