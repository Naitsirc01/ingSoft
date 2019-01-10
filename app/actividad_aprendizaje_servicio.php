<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad_aprendizaje_servicio extends Model
{
    protected $fillable = [
        'nombre_profesor','cantidad_estudiantes','nombre_socio','semestre/año','asignaturaid','indicadorid'];

    public function indicador(){
        return $this->belongsTo('App\Indicador','asignaturaid');
    }

    public function convenios(){
        return $this->belongsTo('App\Convenio','indicadorid');
    }

    public function evidencia(){
        return $this->belongsTo('App\evidencia');
    }
}
