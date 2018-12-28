<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad_aprendizaje_servicio extends Model
{
    protected $fillable = [
        'nombre_profesor','cantidad_estudiante','nombre_socio','semestre/año','evidencia','asignaturaid','indicadorid'];

    public function indicador(){
        return $this->belongsTo('App\Indicador','asignaturaid');
    }

    public function convenios(){
        return $this->belongsTo('App\Convenio','indicadorid');
    }
}
