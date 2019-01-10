<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evidencia extends Model
{
    protected $fillable = [
         'archivo','actividad_aysid'];
    protected $fillable2 = [
        'archivo','actividad_aysid'];

    public function actividadays(){
        return $this->hasMany('App\Aprendizaje','actividad_aysid');
    }
    public function actividadconv(){
        return $this->belongsTo('App\Registroconvenio','actividad_convenioid');
    }
}
