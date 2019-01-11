<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
        'departamento','año','cantidad_alcanzada1',
        'cantidad_alcanzada2', 'indicadores_id'];

    public function indicador(){
        return $this->belongsTo('App\Indicadores','indicadores_id');
    }
}
