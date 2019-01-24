<?php

namespace App\Http\Controllers;

use App\atc_extension;
use App\Indicadores;
use App\Registro;
use App\Profesore;
use App\evidencia;
use Illuminate\Http\Request;
use App\Traits\preload;

class AtcExtensionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    use preload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicadores=Indicadores::all();
        $extensiones=atc_extension::all();
        $profesores=Profesore::all();
        return view("/act_registro_extension", compact("extensiones","indicadores","profesores"));
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

        $idindicador=$request->input('idIndicador');
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
        $arreglo=$request->expositor;
        $expositor1="";
        foreach ($arreglo as $valor) {
            $expositor1 = $valor . ',' . $expositor1;
        }
        unset($valor);
        /*$arreglo1=$request->organizador;
        $organizador1="";
        foreach ($arreglo1 as $valor1) {
            $organizador1 = $valor1 . ',' . $organizador1;
        }
        unset($valor1);*/

        $indicador = Indicadores::find(1);

        $extension=new atc_extension;
        $extension->titulo=$request->titulo;
        $extension->expositor=$expositor1;
        $extension->fecha=$request->fecha;
        $extension->ubicacion=$request->ubicacion;
        $extension->cantidad_asistentes=$request->cantidad_asistentes;

        $arreglo=$request->organizador;
        $extension->profesor_id1 = $arreglo[0];
        if(count($arreglo)==2){
            $extension->profesor_id2 = $arreglo[1];
        }
        $extension->tipo_extension=$request->tipo_extension;

        $indicador->atc_extensiones()->save($extension);


        $registro=Registro::find(1);


       $registro->cantidad_de_atc_extension=atc_extension::all()->count();
       $total=$registro->cantidad_de_asistentes+$request->cantidad_asistentes;
       $registro->cantidad_de_asistentes=$total;
       $registro->save();

        $registro2 = new \App\evidencia(['archivo'=>$path]);

        $extension->evidencia()->save($registro2);




        $this->loadData(1,1);
        return redirect('/act_regitro_extension')->with('success','Se ha registrado correctamente.');
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
        $arreglo=$request->expositor;
        $expositor1="";
        foreach ($arreglo as $valor) {
            $expositor1 = $valor . ',' . $expositor1;
        }
        unset($valor);

        $path=$request->file('evidencia')->store('upload');
        $extension=atc_extension::find($id);
        $extension->titulo=$request->titulo;
        $extension->expositor=$expositor1;
        $extension->fecha=$request->fecha;
        $extension->ubicacion=$request->ubicacion;
        $extension->cantidad_asistentes=$request->cantidad_asistentes;

        $arreglo=$request->organizador;
        $extension->profesor_id1 = $arreglo[0];
        if(count($arreglo)==2){
            $extension->profesor_id2 = $arreglo[1];
        }
        if(count($arreglo)==1){
            $extension->profesor_id2 = null;
        }
        $extension->tipo_extension=$request->tipo_extension;
        $extension->save();

        $archivo = evidencia::where('atc_extension_id','=',$id)->first();
        $archivo->archivo=$path;
        $archivo->save();

        $registro=Registro::find(1);
        $registro->cantidad_de_atc_extension=atc_extension::all()->count();
        if($registro->cantidad_de_estudiantes!=$request->input('cantidad_asistentes')){
            //cantidad actual-cantidad del editado antes+cantidad nueva
            $total=$registro->cantidad_de_asistentes-$registro->cantidad_de_asistentes+$request->input('cantidad_asistentes');
            $registro->cantidad_de_asistentes=$total;
            $registro->save();
        }
        $this->loadData(1,1);
        return redirect('/act_regitro_extension')->with('success','Se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\atc_extension  $atc_extension
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=Registro::find(1);
        $extension=atc_extension::find($id);

        $total=$registro->cantidad_de_asistentes-$extension->cantidad_asistentes;
        $registro->cantidad_de_asistentes=$total;

        $extension->delete();
        $registro->cantidad_de_atc_extension=atc_extension::all()->count();
        $registro->save();
        $this->loadData(1,1);
        return redirect('/act_regitro_extension')->with('success','Se ha eliminado correctamente.');
    }
}
