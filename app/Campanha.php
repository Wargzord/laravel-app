<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = ['nome', 'dataInicio', 'dataFim', 'valorComissao', 'gerente'];

    public function criativos(){
        return $this->hasMany('App\Criativos');
    }
}
