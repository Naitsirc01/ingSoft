<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evidencia extends Model
{
    protected $fillable = [
         'archivo','actividad_aysid'];

    public function actividad(){
        return $this->belongsTo('App\ActividadTitulados','actividad_aysid');
    }
}
