<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atc_extension extends Model
{
    protected $fillable = [
        'titulo','expositor','fecha','ubicacion', 'cantidad_asistentes','organizador' , 'tipo_extension','Indicadores_id'];

    public function indicador(){
        return $this->belongsTo('App\Indicadores','Indicadores_id');
    }
    public function actividad(){
        return $this->belongsTo('App\actividad_definida','tipo_extension');
    }
    public function profesor1(){
        return $this->belongsTo('App\Profesore','profesor_id1');
    }

    public function profesor2(){
        return $this->belongsTo('App\Profesore','profesor_id2');
    }
    public function evidencia(){
        return $this->hasMany('App\evidencia');
    }
}
