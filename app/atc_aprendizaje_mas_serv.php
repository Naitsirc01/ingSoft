<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atc_aprendizaje_mas_serv extends Model
{
    protected $fillable = [
        'nombre_profesor','cantidad_estudiantes','nombre_socio','semestreaño','asignaturaid','indicadorid'];


    public function indicador(){
        return $this->belongsTo('App\Indicador','indicadorid');
    }

    public function evidencia(){
        return $this->hasOne('App\evidencia');
    }
}
