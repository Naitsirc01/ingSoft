<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad_convenio extends Model
{
    protected $fillable = [
        'empresa','tipo_convenio', 'fecha_comienzo','duracion', 'indicadorid'];

}
