<?php

namespace App\Http\Controllers;

use App\atc_aprendizaje_mas_serv;
use App\departamento;
use App\Profesore;
use App\User;
use App\usuario;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios=User::all();
        $departamentos=departamento::all();
        $privilegios=Role::all();
        $request->user()->authorizeRoles(['admin']);
        return view('/menuAdmin',compact('usuarios','departamentos','privilegios'));
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

        $role_user = Role::where('name', $request->privilegio)->first();

        $user = new User();
        $user->nombre = $request->name;
        $user->email = $request->email;
        $user->rut = $request->rut;
        $user->departamento_id = $request->departamento;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($role_user);

        return redirect('/menuAdmin')->with('success','Se ha registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        $role_user = Role::where('name', $request->privilegio)->first();
//        dd($role_user);
        $user=User::find($id);
        $user->nombre=$request->name;
        $user->email=$request->email;
        $user->rut=$request->rut;
        $user->departamento_id=$request->departamento;
        $user->roles()->sync([$request->input('privilegio')]);
        $user->save();
        return redirect('/menuAdmin')->with('success','Se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=User::find($id);
        $usuario->delete();

        return redirect('/menuAdmin')->with('success','Se ha eliminado correctamente.');
    }
}
