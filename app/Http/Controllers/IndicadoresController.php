<?php

namespace App\Http\Controllers;

use App\atc_extension;
use App\atc_titulacion_con;
use App\Extension;
use App\Registro;
use App\Indicadores;
use App\atc_aprendizaje_mas_serv;
use App\Registroconvenio;
use App\Titulado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //parar retornar columnas
//        $columnasExtension=Schema::getColumnListing('atc_extensions');
//        $columnasRegConvenio=Schema::getColumnListing('registroconvenios');
        //descartado por tener pocas opciones
//        $columnasAprendizajeServicio=Schema::getColumnListing('atc_aprendizaje_mas_servs');
//        $columnasTitulacionCon=Schema::getColumnListing('atc_titulacion_cons');
//        $columnasAprendizajeServicio=['cantidad_estudiante'];
//        $columnasExtension=['cantidad_asistentes'];

        $indicadores=Indicadores::all();
        //consulta de los indicadores
//        $reg = Registro::find(1);
//        for ($i = 1; $i <= count($indicadores); $i++) {
//            $data = Indicadores::find($i);
//            switch ($data->tipo1){
//                case 0:
//                    $data->parametro1=$reg->total_de_actividades;
//                    break;
//                case 1:
//                    $data->parametro1=$reg->cantidad_de_atc_AprServ;
//                    break;
//                case 2:
//                    $data->parametro1=$reg->cantidad_de_atc_extension;
//                    break;
//                case 3:
//                    $data->parametro1=$reg->cantidad_de_atc_titulacionCon;
//                    break;
//                case 4:
//                    $data->parametro1=$reg->cantidad_de_atc_registroCon;
//                    break;
//                case 5:
//                    $data->parametro1=$reg->cantidad_de_estudiantes;
//                    break;
//                case 6:
//                    $data->parametro1=$reg->cantidad_de_asistentes;
//                    break;
//                case 7:
//                    $data->parametro1=$reg->cantidad_de_titulados;
//                    break;
//            }
//            if($data->tipo_de_calculo==2){
//                switch ($data->tipo2){
//                    case 0:
//                        $data->parametro2=$reg->total_de_actividades;
//                        break;
//                    case 1:
//                        $data->parametro2=$reg->cantidad_de_atc_AprServ;
//                        break;
//                    case 2:
//                        $data->parametro2=$reg->cantidad_de_atc_extension;
//                        break;
//                    case 3:
//                        $data->parametro2=$reg->cantidad_de_atc_titulacionCon;
//                        break;
//                    case 4:
//                        $data->parametro2=$reg->cantidad_de_atc_registroCon;
//                        break;
//                    case 5:
//                        $data->parametro2=$reg->cantidad_de_estudiantes;
//                        break;
//                    case 6:
//                        $data->parametro2=$reg->cantidad_de_asistentes;
//                        break;
//                    case 7:
//                        $data->parametro2=$reg->cantidad_de_titulados;
//                        break;
//                }
//            }
//            $data->save();
//        }

        return view("/indicadores",compact('indicadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'mdes'=>'required',
            'tipoCal'=>'required',
            'param1'=>'required',
            'param2'=>'required',
            'meta1'=>'required',
            'meta'=>'required',
        ]);

        $indicador=new Indicadores;
        $indicador->nombre=$request->input('nombre');
        $indicador->meta_descripcion=$request->input('mdes');
        $indicador->tipo_de_calculo=$request->input('tipoCal');
        $indicador->parametro1=0;
        $indicador->parametro2=0;
        $indicador->tipo1=$request->input('param1');
        $indicador->tipo2=$request->input('param2');
        $indicador->meta1=$request->input('meta1');
        $indicador->meta2=$request->input('meta2');
        $indicador->año_meta=$request->input('meta');
        $indicador->usuario_id=1;
        $indicador->save();



        $registro=new Registro;
        $registro->departamento='no definido';
        $registro->año=Carbon::now();
        $registro->cantidad_alcanzada1=0;
        $registro->cantidad_alcanzada2=0;
        $indicador->registros()->save($registro);

        return redirect('/indicadores')->with('success','Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function show(Indicadores $indicadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicadores $indicadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'mdes'=>'required',
            'tipoCal'=>'required',
            'param1'=>'required',
            'param2'=>'required',
            'meta1'=>'required',
            'meta'=>'required',
        ]);
        $indicador=Indicadores::find($id);
        $indicador->nombre=$request->input('nombre');
        $indicador->meta_descripcion=$request->input('mdes');
        $indicador->tipo_de_calculo=$request->input('tipoCal');
        $indicador->parametro1=$request->input('param1');
        $indicador->parametro2=$request->input('param2');
        $indicador->meta1=$request->input('meta1');
        $indicador->meta2=$request->input('meta2');
        $indicador->año_meta=$request->input('meta');
        $indicador->usuario_id=1;
        $indicador->save();

        return redirect('/indicadores')->with('success','Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicador=Indicadores::find($id);
        $indicador->delete();
        return redirect('/indicadores')->with('success','Eliminado');
    }
}
