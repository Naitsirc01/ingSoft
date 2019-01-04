<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividadtitulados extends Model
{
    protected $fillable = [
        'titulado','rut','telefono','email', 'empresa','añoTitulacion' , 'carrera','indicadorid'];

    public function indicador(){
        return $this->belongsTo('App\Indicador','indicadorid');
    }
}
