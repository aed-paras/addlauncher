<?php

namespace App\Http\Controllers\admin\metro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetroController extends Controller{

    public function index(){
        return view('admin.metro.index');
    }

}
