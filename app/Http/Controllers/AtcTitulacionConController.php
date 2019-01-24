<?php

namespace App\Http\Controllers;

use App\atc_titulacion_con;
use App\Indicadores;
use App\Profesore;
use App\Registro;
use App\evidencia;
use Illuminate\Http\Request;
use App\Traits\preload;

class AtcTitulacionConController extends Controller
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
    public function index(Request $request)
    {
        $profesores=Profesore::all();
        $titulacions=atc_titulacion_con::all();
        $request->user()->authorizeRoles(['secretaria','encargado', 'admin']);
        return view("/act_titulacion_con", compact("titulacions","indicadores","profesores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("act_titulacion_con.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $path=$request->file('evidencia')->store('upload');
        $this->validate($request,[
            'titulo'=>'required',
            'nombre'=>'required',
            'rut'=>'required',
            'carrera'=>'required',
            'fecha_inicio'=>'required',
            'profesor'=>'required',
            'empresa'=>'required'
        ]);
        $indicador = Indicadores::find(1);
        $arreglo=$request->nombre;
        $nombre1="";
        foreach ($arreglo as $valor) {
            $nombre1 = $valor . ',' . $nombre1;
        }
        unset($valor);
//        $arreglo=$request->profesor;
//        $nombreProfe="";
//        foreach ($arreglo as $valor) {
//            $nombreProfe = $valor . ',' . $nombreProfe;
//        }
        unset($valor1);
        $arreglo2=$request->rut;
        $rut1="";
        foreach ($arreglo2 as $valor2){
            $rut1 = $valor2. ',' .$rut1;
        }
        unset($valor2);
        //$nombre1 =$nombre1+ $request->nombre[i].',';
        //$nombre1 = $request->nombre[0].','.$request->nombre[1].','.$request->nombre[2].','.$request->nombre[3];
        $titulacion=new atc_titulacion_con;
        $titulacion->titulo=$request->titulo;
        $titulacion->nombre=$nombre1;
        $titulacion->rut=$rut1;
        $titulacion->carrera=$request->input('carrera');
        $titulacion->fecha_inicio=$request->input('fecha_inicio');
        $titulacion->fecha_termino=$request->input('fecha_termino');

        $arreglo=$request->profesor;
        $titulacion->profesor_id1 = $arreglo[0];
        if(count($arreglo)==2){
            $titulacion->profesor_id2 = $arreglo[1];
        }

        $titulacion->empresa=$request->input('empresa');

        $indicador->atc_titulacionCon()->save($titulacion);
        //actualizacion de registros

        $registro=Registro::find(1);

        $registro->cantidad_de_atc_titulacionCon=atc_titulacion_con::all()->count();
        $registro->save();

        $archivo = new \App\evidencia(['archivo'=>$path]);

        $titulacion->evidencia()->save($archivo);

        $this->loadData(3,1);
        return redirect('/act_titulacion_con')->with('success','Se ha registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$titulacions=Titulacion::findOrFail($id);
        return view("act_titulacion_con.show", compact("act_titulacion_con"));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* $titulacions=Titulacion::findOrFail($id);
         return view("act_titulacion_con.edit", compact("act_titulacion_con"));*/
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
        $this->validate($request, [
            'titulo' => 'required',
            'nombre' => 'required',
            'rut' => 'required',
            'carrera' => 'required',
            'fecha_inicio' => 'required',
            'profesor' => 'required',
            'empresa' => 'required'
        ]);
        $arreglo = $request->nombre;
        $nombre1 = "";
        foreach ($arreglo as $valor) {
            $nombre1 = $valor . ',' . $nombre1;
        }
        unset($valor);

        $arreglo2 = $request->rut;
        $rut1 = "";
        foreach ($arreglo2 as $valor2) {
            $rut1 = $valor2 . ',' . $rut1;
        }
        unset($valor2);

       /* $termino=$request->fecha_termino;
        $inicio=$request->fecha_inicio;
        if($termino<=$inicio)
            $this->validate($request[
                'fecha_termino' =>'required']);
        endif*/


        $path=$request->file('evidencia')->store('upload');
        /*$titulacion=Titulacion::findOrFail($id);*/
        $titulacion=atc_titulacion_con::find($id);
        $titulacion->titulo=$request->titulo;
        $titulacion->nombre=$nombre1;
        $titulacion->rut=$rut1;
        $titulacion->carrera=$request->input('carrera');
        $titulacion->fecha_inicio=$request->input('fecha_inicio');
        $titulacion->fecha_termino=$request->input('fecha_termino');
        $arreglo=$request->profesor;
        $titulacion->profesor_id1 = $arreglo[0];
        if(count($arreglo)==2){
            $titulacion->profesor_id2 = $arreglo[1];
        }
        if(count($arreglo)==1){
            $titulacion->profesor_id2 = null;
        }
        $titulacion->empresa=$request->input('empresa');
        $titulacion->save();



        $archivo = evidencia::where('atc_titulacion_con_id','=',$id)->first();
//        $archivo = evidencia::find($id);
        $archivo->archivo=$path;
        $archivo->save();


        /*return redirect("/act_titulacion_con");*/
        return redirect('/act_titulacion_con')->with('success','Se ha actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titulacion=atc_titulacion_con::find($id);
        $registro=Registro::find(1);
        $titulacion->delete();
        $registro->cantidad_de_atc_titulacionCon=atc_titulacion_con::all()->count();
        $registro->save();
        $this->loadData(3,1);
        return redirect('/act_titulacion_con')->with('success','Se ha eliminado correctamente.');
    }
}

