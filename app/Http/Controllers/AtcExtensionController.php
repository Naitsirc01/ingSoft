<?php

namespace App\Http\Controllers;

use App\atc_extension;
use App\Indicadores;
use App\Registro;
use App\evidencia;
use Illuminate\Http\Request;

class AtcExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extensiones=atc_extension::all();
        return view("/act_registro_extension", compact("extensiones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("act_regitro_extension.create");
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
            'titulo'=>'required',
            'expositor'=>'required',
            'fecha'=>'required',
            'ubicacion'=>'required',
            'cantidad_asistentes'=>'required',
            'organizador'=>'required',
            'tipo_extension'=>'required'
        ]);

        $path=$request->file('evidencia')->store('upload');
//        $extension = new \App\atc_extension(['titulo'=>$request->titulo,
//            'expositor'=>$request->expositor,
//            'fecha'=>$request->fecha,
//            'ubicacion'=>$request->ubicacion,
//            'cantidad_asistentes'=>$request->cantidad_asistentes,
//            'organizador'=>$request->organizador,
//            'tipo_extension'=>$request->tipo_extension,
//            'Indicadores_id'=>1]);
//        $extension->save();

        $indicador = Indicadores::find(1);

        $extension=new atc_extension;
        $extension->titulo=$request->titulo;
        $extension->expositor=$request->expositor;
        $extension->fecha=$request->fecha;
        $extension->ubicacion=$request->ubicacion;
        $extension->cantidad_asistentes=$request->cantidad_asistentes;
        $extension->organizador=$request->organizador;
        $extension->tipo_extension=$request->tipo_extension;

        $indicador->atc_extensiones()->save($extension);


        $registro=Registro::find(1);
        $total=$registro->cantidad_alcanzada2+$request->cantidad_asistentes;
        $registro->cantidad_alcanzada1=atc_extension::all()->count();
        $registro->cantidad_alcanzada2=$total;
        $registro->save();


        $totalIndicador=$total+$indicador->parametro2;
        $indicador->parametro2=$totalIndicador;
        $indicador->parametro1=atc_extension::all()->count();


        $registro2 = new \App\evidencia(['archivo'=>$path]);

        $extension->evidencia()->save($registro2);





        return redirect('/act_regitro_extension')->with('success','Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\atc_extension  $atc_extension
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $extensiones=atc_extension::findOrFail($id);
        return view("act_regitro_extension.show", compact("act_regitro_extension"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\atc_extension  $atc_extension
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extensiones=atc_extension::findOrFail($id);
        return view("act_regitro_extension.edit", compact("act_regitro_extension"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\atc_extension  $atc_extension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titulo'=>'required',
            'expositor'=>'required',
            'fecha'=>'required',
            'ubicacion'=>'required',
            'cantidad_asistentes'=>'required',
            'organizador'=>'required',
            'tipo_extension'=>'required'
        ]);
        /*$extensiones=Extension::findOrFail($id);*/
        $path=$request->file('evidencia')->store('upload');
        $extension=atc_extension::find($id);
        $extension->titulo=$request->titulo;
        $extension->expositor=$request->expositor;
        $extension->fecha=$request->fecha;
        $extension->ubicacion=$request->ubicacion;
        $extension->cantidad_asistentes=$request->cantidad_asistentes;
        $extension->organizador=$request->organizador;
        $extension->tipo_extension=$request->tipo_extension;
        $extension->save();

        $archivo = evidencia::find($id);
        $archivo->archivo=$path;
        $archivo->save();

        return redirect('/act_regitro_extension')->with('success','Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\atc_extension  $atc_extension
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extension=atc_extension::find($id);
        $extension->delete();
        return redirect('/act_regitro_extension')->with('success','Eliminado');
    }
}
