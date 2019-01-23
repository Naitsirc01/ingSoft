<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atc_titulacion_con extends Model
{
    protected $fillable = [
        'titulo','nombre','rut','carrera', 'fecha_inicio','fecha_termino' , 'nombre_profesor','empresa',
        'Indicadores_id'];

    public function indicador(){
        return $this->belongsTo('App\Indicadores','Indicadores_id');
    }

    public function evidencia(){
        return $this->hasOne('App\evidencia');
    }
}
