<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad_convenio extends Model
{
    protected $fillable = [
        'empresa','tipo_convenio', 'fecha_comienzo','duracion', 'indicadorid'];

    public function indicador(){
        return $this->belongsTo('App\Indicador','tipo_convenio');
    }

    public function convenios(){
        return $this->belongsTo('App\Convenio','indicadorid');
    }



}
