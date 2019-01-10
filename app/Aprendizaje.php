<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aprendizaje extends Model
{
    protected $fillable = [
        'nombre_profesor','cantidad_estudiantes','nombre_socio','semestreaño','asignaturaid','indicadorid'];


    public function indicador(){
        return $this->belongsTo('App\Indicador','indicadorid');
    }

    public function evidencia(){
        return $this->hasOne('App\evidencia');
    }

/*
    public function indicador(){
        return $this->belongsTo('App\Indicador','asignaturaid');
    }

    public function convenios(){
        return $this->belongsTo('App\Convenio','indicadorid');
    }
*/
}
