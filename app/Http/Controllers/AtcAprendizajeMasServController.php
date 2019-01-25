<?php

namespace App\Http\Controllers;

use App\atc_aprendizaje_mas_serv;
use App\Indicadores;
use App\Registro;
use App\evidencia;
use App\Profesore;
use Illuminate\Http\Request;
use App\Traits\preload;

class AtcAprendizajeMasServController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    use preload;

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aprendizajes=atc_aprendizaje_mas_serv::all();
        $profesores=Profesore::all();
        $request->user()->authorizeRoles(['secretaria','encargado', 'admin']);
        return view("/act_aprendizaje_servicio", compact("aprendizajes","profesores"));
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
        //no es necesario
//        $this->validate($request,[
//            'nombre_profesor'=>'required',
//            'cantidad_estudiantes'=>'required',
//            'nombre_socio'=>'required',
//            'semestreaño'=>'required',
//            'asignaturaid'=>'required',
//            'idIndicador'=>'requiered',
//        ]);
       /* $arreglo=$request->nombre_profesor;
        $nombreProfe="";
        foreach ($arreglo as $valor) {
            $nombreProfe = $valor . ',' . $nombreProfe;
        }
        unset($valor);*/
        $arreglo1=$request->nombre_socio;
        $nombreSocio="";
        foreach ($arreglo1 as $valor1) {
            $nombreSocio = $valor1 . ',' . $nombreSocio;
        }
        unset($valor1);
        $path=$request->file('evidencia')->store('upload');

        //se busca el indicador asociado
        $indicador = Indicadores::find(2);

        //creacion de la actividad
        $aprendizaje=new atc_aprendizaje_mas_serv;
       // $aprendizaje->nombre_profesor=$nombreProfe;
        //dd($request->nombre_profesor);
        $arreglo=$request->nombre_profesor;
        $aprendizaje->profesor_id1 = $arreglo[0];
        if(count($arreglo)==2){
            $aprendizaje->profesor_id2 = $arreglo[1];
        }
        $aprendizaje->cantidad_estudiantes=$request->input('cantidad_estudiantes');
        $aprendizaje->nombre_socio=$nombreSocio;
        $aprendizaje->semestreaño=$request->input('semestreaño');
        $aprendizaje->asignaturaid=$request->input('asignaturaid');;

        $indicador->atc_aprendizajeServ()->save($aprendizaje);

        //actualizacion de registros
        $registro=Registro::find(1);

        $registro->cantidad_de_atc_AprServ=atc_aprendizaje_mas_serv::all()->count();
        $total=$registro->cantidad_de_estudiantes+$request->cantidad_estudiantes;
        $registro->cantidad_de_estudiantes=$total;
        $registro->save();

        $archivo = new \App\evidencia(['nombre'=>$request->file('evidencia')->getClientOriginalName(),'archivo'=>$path]);
//        $registro2=new evidencia;
//        $registro2->archivo=$request->input('evidencia');

        $aprendizaje->evidencia()->save($archivo);

//        $totalIndicador=$total+$indicador->parametro2;
//        $indicador->parametro2=$totalIndicador;
//        $indicador->parametro1=atc_aprendizaje_mas_serv::all()->count();
//        $indicador->save();

        $this->loadData(2,1);
        return redirect('/act_aprendizaje_servicio')->with('success','Se ha registrado correctamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre_profesor'=>'required',
            'cantidad_estudiantes'=>'required',
            'nombre_socio'=>'required',
            'semestreaño'=>'required',
            'asignaturaid'=>'required'
        ]);
        $arreglo1=$request->nombre_socio;
        $nombreSocio="";
        foreach ($arreglo1 as $valor1) {
            $nombreSocio = $valor1 . ',' . $nombreSocio;
        }
        unset($valor1);
        $path=$request->file('evidencia')->store('upload');
        $aprendizaje=atc_aprendizaje_mas_serv::find($id);

        //resta de cantidad anterior
        $registro=Registro::find(1);
        $registro->cantidad_de_atc_AprServ=atc_aprendizaje_mas_serv::all()->count();
        if($registro->cantidad_de_estudiantes!=$request->input('cantidad_estudiantes')){
            //cantidad actual-cantidad del editado antes+cantidad nueva
            $total=$registro->cantidad_de_estudiantes-$aprendizaje->cantidad_estudiantes+$request->input('cantidad_estudiantes');
            $registro->cantidad_de_estudiantes=$total;
            $registro->save();
        }

        $arreglo=$request->nombre_profesor;
        $aprendizaje->profesor_id1 = $arreglo[0];
        if(count($arreglo)==2){
            $aprendizaje->profesor_id2 = $arreglo[1];
        }
        if(count($arreglo)==1){
            $aprendizaje->profesor_id2 = null;
        }
        $aprendizaje->cantidad_estudiantes=$request->input('cantidad_estudiantes');
        $aprendizaje->nombre_socio=$nombreSocio;
        $aprendizaje->semestreaño=$request->input('semestreaño');
        $aprendizaje->asignaturaid=$request->input('asignaturaid');
        $aprendizaje->save();


        $archivo = evidencia::where('atc_aprendizaje_mas_serv_id','=',$id)->first();
        $archivo->archivo=$path;
        $archivo->nombre=$request->evidencia->getClientOriginalName();
        $archivo->save();


        $this->loadData(2,1);
        return redirect('/act_aprendizaje_servicio')->with('success','Se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aprendizaje=atc_aprendizaje_mas_serv::find($id);
        //resta de la cantidad
        $registro=Registro::find('1');

        $total=$registro->cantidad_de_estudiantes-$aprendizaje->cantidad_estudiantes;
        $registro->cantidad_de_estudiantes=$total;
        $aprendizaje->delete();
        $registro->cantidad_de_atc_AprServ=atc_aprendizaje_mas_serv::all()->count();
        $registro->save();
        $this->loadData(2,1);
        return redirect('/act_aprendizaje_servicio')->with('success','Se ha eliminado correctamente.');
    }
}
