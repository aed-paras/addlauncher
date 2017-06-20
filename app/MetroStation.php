<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetroStation extends Model{

    public function metro_line(){
        return $this->belongsTo('App\MetroLine');
    }

}
