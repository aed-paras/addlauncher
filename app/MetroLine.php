<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetroLine extends Model{

    public function metro_city(){
        return $this->belongsTo('App\MetroCity');
    }

}
