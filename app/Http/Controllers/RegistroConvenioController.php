<?php

namespace App\Http\Controllers;

use App\atc_aprendizaje_mas_serv;
use App\atc_extension;
use App\atc_titulacion_con;
use App\convenio;
use App\evidencia;
use Illuminate\Http\Request;
use App\Registroconvenio;
use App\Indicadores;
use App\Registro;

class RegistroConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conv = Registroconvenio::all();
        $tipoCon= convenio::all();
        return view('/reg_registro_convenio',compact('conv','tipoCon'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'tipoCon' => 'required',
            'fecha' => 'required',
            'duracion' => 'required'
        ]);
        $path=$request->file('evidencia')->store('upload');
        $indicador = Indicadores::find(4);
        $registroCon = new Registroconvenio;
        $registroCon->empresa = $request->input('nombre');
        $registroCon->convenioid = $request->input('tipoCon');
        $registroCon->fecha_comienzo = $request->input('fecha');
        $registroCon->duracion = $request->input('duracion');

        $indicador->atc_registroCon()->save($registroCon);

        $registro = Registro::find(4);
        $totalActAprendizaje = atc_aprendizaje_mas_serv::all()->count();
        $totalActExtencion = atc_extension::all()->count();
        $totalActTitulacionCon = atc_titulacion_con::all()->count();
        $total = $totalActAprendizaje + $totalActExtencion + $totalActTitulacionCon;
        $registro->cantidad_alcanzada1 = Registroconvenio::all()->count();
        $registro->cantidad_alcanzada2 = $total;
        $registro->save();

        $archivo = \App\evidencia::create(
            ['archivo' => $path,
                'actividad_convenioid' => $registro->id]);
        $registroCon->evidencia()->save($archivo);

        $indicador->parametro2 = $total;
        $indicador->parametro1 = Registroconvenio::all()->count();
        $indicador->save();

        return redirect('/reg_registro_convenio')->with('success','Registrado'.$path);
    }

        /*
         * $registro2 = \App\evidencia::create(
            ['archivo'=>$request->evidencia,
                'actividad_convenioid'=>$registro->id]);



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
            'nombre'=>'required',
            'tipoCon'=>'required',
            'fecha'=>'required',
            'duracion'=>'required'
        ]);
        $path=$request->file('evidencia')->store('upload');
        $registro=Registroconvenio::find($id);
        $registro->empresa=$request->input('nombre');
        $registro->convenioid=$request->input('tipoCon');
        $registro->fecha_comienzo=$request->input('fecha');
        $registro->duracion=$request->input('duracion');
        $registro->save();

        $archivo = evidencia::where('Registroconvenio_id','=',$id)->first();
        $archivo->archivo=$path;
        $archivo->save();

        /*

         $registro2 = \App\evidencia::create(
            ['archivo'=>$request->evidencia,
                'actividad_convenioid'=>$registro->id]);
        */
        return redirect('/reg_registro_convenio')->with('success','Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=Registroconvenio::find($id);
        $registro->delete();
        return redirect('/reg_registro_convenio')->with('success','Eliminado');
    }
}
