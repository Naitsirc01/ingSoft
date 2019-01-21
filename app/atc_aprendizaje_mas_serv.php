<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atc_aprendizaje_mas_serv extends Model
{
    protected $fillable = [
        'nombre_profesor','cantidad_estudiantes','nombre_socio','semestreaño','asignaturaid','Indicadores_id'];


    public function indicador(){
        return $this->belongsTo('App\Indicadores','Indicadores_id');
    }
    public function asignatura(){
        return $this->belongsTo('App\asignatura','asignaturaid');
    }

    public function evidencia(){
        return $this->hasOne('App\evidencia');
    }
}
