<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atc_titulacion_con extends Model
{
    protected $fillable = [
        'titulo','nombre','rut','carrera', 'fecha_inicio','fecha_termino' , 'profesor','empresa','atc_titulacion_con'];

    public function indicador(){
        return $this->belongsTo('App\Indicadores','Indicadores_id');
    }

    public function evidencia(){
        return $this->hasOne('App\evidencia');
    }
}
