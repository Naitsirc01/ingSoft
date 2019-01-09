<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    protected $fillable = [
        'titulo','nombre','rut','carrera', 'fecha_inicio','fecha_termino' , 'profesor','empresa'];
    public function indicador(){
        return $this->belongsTo('App\Indicador','indicadorid');
    }
}
