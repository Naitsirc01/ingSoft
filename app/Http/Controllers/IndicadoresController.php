<?php

namespace App\Http\Controllers;

use App\Extension;
use App\Indicadores;
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
        $columnasExtension=Schema::getColumnListing('atc_extensions');
        $columnasRegConvenio=Schema::getColumnListing('registroconvenios');
        $columnasAprendizajeServicio=Schema::getColumnListing('atc_aprendizaje_mas_servs');
        $columnasTitulacionCon=Schema::getColumnListing('atc_titulacion_cons');
        $indicadores=Indicadores::all();
        return view("/indicadores",compact('indicadores',
            'columnasExtension',
            'columnasRegConvenio',
            'columnasAprendizajeServicio',
            'columnasTitulacionCon'));
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
            'objetivo'=>'required',
            'mdes'=>'required',
            'tipoCal'=>'required',
            'param1'=>'required',
            'param2'=>'required',
            'meta1'=>'required',
            'meta'=>'required',
        ]);

        $indicador=new Indicadores;
        $indicador->nombre=$request->input('nombre');
        $indicador->objetivo=$request->input('objetivo');
        $indicador->meta_descripcion=$request->input('mdes');
        $indicador->tipo_de_calculo=$request->input('tipoCal');
        $indicador->parametro1=$request->input('param1');
        $indicador->parametro2=$request->input('param2');
        $indicador->meta1=$request->input('meta1');
        $indicador->meta2=$request->input('meta2');
        $indicador->año_meta=$request->input('meta');
        $indicador->usuario_id=1;
        $indicador->save();

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
            'objetivo'=>'required',
            'mdes'=>'required',
            'tipoCal'=>'required',
            'param1'=>'required',
            'param2'=>'required',
            'meta1'=>'required',
            'meta'=>'required',
        ]);
        $indicador=Indicadores::find($id);
        $indicador->nombre=$request->input('nombre');
        $indicador->objetivo=$request->input('objetivo');
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
