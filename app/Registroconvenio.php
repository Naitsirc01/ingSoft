<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registroconvenio extends Model
{
    protected $fillable = [
        'empresa','convenioid', 'fecha_comienzo','duracion', 'indicadorid'];


    public function indicador(){
        return $this->belongsTo('App\Indicador','indicadorid');
    }

    /*UN COSITO
    public function indicador(){
        return $this->belongsTo('App\Indicador','tipo_convenio');
    }



     public function convenios(){
        return $this->belongsTo('App\Convenio','indicadorid');
    }
    */
}
