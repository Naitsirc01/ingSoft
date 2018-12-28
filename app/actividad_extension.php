<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad_extension extends Model
{
    protected $fillable = [
        'titulo','expositor','fecha','ubicacion', 'cantidad_asistentes','organizador' , 'tipo_extension','indicadorid'];

    public function indicador(){
        return $this->belongsTo('App\Indicador','indicadorid');
    }

}
