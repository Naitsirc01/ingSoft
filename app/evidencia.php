<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evidencia extends Model
{
    protected $fillable = [
         'archivo','aprendizaje_id','atc_titulacion_con_id','atc_extension_id'];


    public function actividadays(){
        return $this->belongsTo('App\atc_aprendizaje_mas_serv','atc_aprendizaje');
    }
    public function acttitulacioncon(){
        return $this->belongsTo('App\atc_titulacion_con','atc_titulacion_con_id');
    }

    public function actextension(){
        return $this->belongsTo('App/atc_extension','atc_extension_id');

    }
    public function actconvenio(){
        return $this->belongsTo('App/Registroconvenio','Registroconvenio_id');

    }
}
