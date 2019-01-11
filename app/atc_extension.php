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

    public function evidencia(){
        return $this->hasMany('App\evidencia');
    }
}
