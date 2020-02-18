<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criativo extends Model
{
    public function campanha(){
        return $this->belongsTo('App\Campanha');
    }
}
