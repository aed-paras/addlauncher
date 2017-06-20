<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetroCity extends Model{
    
    public function metro_line(){
        return $this->hasMany('App\MetroLine');
    }

}
