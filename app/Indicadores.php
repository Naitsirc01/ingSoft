<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    protected $fillable = [
        'nombre','objetivo','meta_descripcion','tipo_de_calculo', 'parametro1',
        'parametro2','tipo1','tipo2' , 'meta1','meta2','año_meta','usuario_id'];

    public function usuario(){
        return $this->hasOne('App\usuario','usuario_id');
    }

    public function registros(){
        return $this->hasMany('App\Registro');
    }

    public function atc_extensiones(){
        return $this->hasMany('App\atc_extension');
    }
}
