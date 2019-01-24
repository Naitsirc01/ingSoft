<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
        'departamento_id','año','total_de_actividades',
        'cantidad_de_titulados','cantidad_de_asistentes','cantidad_de_estudiantes','cantidad_de_atc_AprServ',
        'cantidad_de_atc_extension','cantidad_de_atc_registroCon','cantidad_de_atc_titulacionCon'];
}
