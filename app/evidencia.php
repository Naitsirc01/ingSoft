<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evidencia extends Model
{
    protected $fillable = [
         'archivo','aprendizaje_id'];

    public function actividadays(){
        return $this->belongsTo('App\Aprendizaje','aprendizaje_id');
    }
    public function actividadconv(){
        return $this->belongsTo('App\Registroconvenio','actividad_convenioid');
    }
}
