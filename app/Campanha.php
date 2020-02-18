<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    public function criativos(){
        return $this->hasMany('App\Criativos');
    }
}
