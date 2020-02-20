<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criativo extends Model
{
    protected $fillable = ['campanha_id', 'tipo', 'urlRedirect', 'urlImage', 'codCupom'];

    public function campanha(){
        return $this->belongsTo('App\Campanha');
    }
}
