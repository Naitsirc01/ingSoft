<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulado extends Model
{
    protected $fillable = [
        'nombre','rut','telefono','correo','empresa','lugar_trabajo','anio_titulacion','carrera'];
    public function indicador(){
        return $this->belongsTo('App\Indicador','indicadorid');
    }
}
