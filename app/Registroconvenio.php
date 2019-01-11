<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registroconvenio extends Model
{
    protected $fillable = [
        'empresa','convenioid', 'fecha_comienzo','duracion', 'Indicadores_id'];


    public function indicador(){
        return $this->belongsTo('App\Indicador','Indicadores_id');
    }

    public function convenio(){
        return $this->belongsTo('App\convenio','convenioid');
    }

    public function evidencia(){
        return $this->hasOne('App\evidencia');
    }

}
