<?php

namespace App\Http\Controllers;

use App\atc_titulacion_con;
use App\Indicadores;
use App\Registro;
use App\evidencia;
use Illuminate\Http\Request;
use App\Traits\preload;

class AtcTitulacionConController extends Controller
{
    use preload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $titulacions=atc_titulacion_con::all();
        return view("/act_titulacion_con", compact("titulacions","indicadores"));

        /*$titulados=Titulado::all();
        return view('titulado')->with('titulados',$titulados);*/
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
        $arreglo=$request->nombre_profesor;
        $nombreProfe="";
        foreach ($arreglo as $valor) {
            $nombreProfe = $valor . ',' . $nombreProfe;
        }
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
        $titulacion->nombre_profesor=$nombreProfe;
        $titulacion->empresa=$request->input('empresa');

        $indicador->atc_titulacionCon()->save($titulacion);
        //actualizacion de registros

        $registro=Registro::find(1);

        $registro->cantidad_de_atc_titulacion_con=atc_titulacion_con::all()->count();

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
        $this->validate($request,[
            'titulo'=>'required',
            'nombre'=>'required',
            'rut'=>'required',
            'carrera'=>'required',
            'fecha_inicio'=>'required',
            'profesor'=>'required',
            'empresa'=>'required'
        ]);
        $arreglo=$request->nombre;
        $nombre1="";
        foreach ($arreglo as $valor) {
            $nombre1 = $valor . ',' . $nombre1;
        }
        unset($valor);
        $arreglo=$request->nombre_profesor;
        $nombreProfe="";
        foreach ($arreglo as $valor) {
            $nombreProfe = $valor . ',' . $nombreProfe;
        }
        unset($valor1);
        $arreglo2=$request->rut;
        $rut1="";
        foreach ($arreglo2 as $valor2){
            $rut1 = $valor2. ',' .$rut1;
        }
        unset($valor2);
        $path=$request->file('evidencia')->store('upload');
        /*$titulacion=Titulacion::findOrFail($id);*/
        $titulacion=atc_titulacion_con::find($id);
        $titulacion->titulo=$request->titulo;
        $titulacion->nombre=$nombre1;
        $titulacion->rut=$rut1;
        $titulacion->carrera=$request->input('carrera');
        $titulacion->fecha_inicio=$request->input('fecha_inicio');
        $titulacion->fecha_termino=$request->input('fecha_termino');
        $titulacion->nombre_profesor=$nombreProfe;
        $titulacion->empresa=$request->input('empresa');
        $titulacion->save();

        $archivo = evidencia::where('atc_titulacion_con_id','=',$id)->first();
        $archivo = evidencia::find($id);
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
        $titulacion->delete();
        return redirect('/act_titulacion_con')->with('success','Se ha eliminado correctamente.');
    }
}
