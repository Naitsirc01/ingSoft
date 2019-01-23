<?php
namespace App\Traits;
use App\Registro;
use App\Indicadores;

trait preload {
    public function loadData($idInd,$idReg){
        $reg = Registro::find($idReg);
        $data = Indicadores::find($idInd);
        switch ($data->tipo1){
            case 0:
                $data->parametro1=$reg->total_de_actividades;
                break;
            case 1:
                $data->parametro1=$reg->cantidad_de_atc_AprServ;
                break;
            case 2:
                $data->parametro1=$reg->cantidad_de_atc_extension;
                break;
            case 3:
                $data->parametro1=$reg->cantidad_de_atc_titulacionCon;
                break;
            case 4:
                $data->parametro1=$reg->cantidad_de_atc_registroCon;
                break;
            case 5:
                $data->parametro1=$reg->cantidad_de_estudiantes;
                break;
            case 6:
                $data->parametro1=$reg->cantidad_de_asistentes;
                break;
            case 7:
                $data->parametro1=$reg->cantidad_de_titulados;
                break;
        }
        if($data->tipo_de_calculo==2){
            switch ($data->tipo2){
                case 0:
                    $data->parametro2=$reg->total_de_actividades;
                    break;
                case 1:
                    $data->parametro2=$reg->cantidad_de_atc_AprServ;
                    break;
                case 2:
                    $data->parametro2=$reg->cantidad_de_atc_extension;
                    break;
                case 3:
                    $data->parametro2=$reg->cantidad_de_atc_titulacionCon;
                    break;
                case 4:
                    $data->parametro2=$reg->cantidad_de_atc_registroCon;
                    break;
                case 5:
                    $data->parametro2=$reg->cantidad_de_estudiantes;
                    break;
                case 6:
                    $data->parametro2=$reg->cantidad_de_asistentes;
                    break;
                case 7:
                    $data->parametro2=$reg->cantidad_de_titulados;
                    break;
            }
        }else{
            $par=$data->parametro1;
            switch ($data->tipo2){
                case 0:
                    $data->parametro2=$par/$reg->total_de_actividades;
                    break;
                case 1:
                    $data->parametro2=$par/$reg->cantidad_de_atc_AprServ;
                    break;
                case 2:
                    $data->parametro2=$par/$reg->cantidad_de_atc_extension;
                    break;
                case 3:
                    $data->parametro2=$par/$reg->cantidad_de_atc_titulacionCon;
                    break;
                case 4:
                    $data->parametro2=$par/$reg->cantidad_de_atc_registroCon;
                    break;
                case 5:
                    $data->parametro2=$par/$reg->cantidad_de_estudiantes;
                    break;
                case 6:
                    $data->parametro2=$par/$reg->cantidad_de_asistentes;
                    break;
                case 7:
                    $data->parametro2=$par/$reg->cantidad_de_titulados;
                    break;
            }
        }
        $data->save();
    }
}