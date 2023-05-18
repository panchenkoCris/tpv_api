<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
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
            'correo' => 'required',
            'contraseña' => 'required',
            'rol' => 'required'
        ]);

        $usuario = new Usuarios();

        $usuario->nombre = $request->input('nombre');
        $usuario->correo = $request->input('correo');
        $usuario->contraseña = $request->input('contraseña');
        $usuario->rol = $request->input('rol');

        $usuario->save();
        return response()->json($usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);
        return response()->json($usuario);
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
        $this->validate($request, []);

        $usuario = Usuarios::find($id);

        if($request->has('nombre')) {
            $usuario->nombre = $request->input('nombre');
        }

        if($request->has('correo')) {
            $usuario->correo = $request->input('correo');
        }

        if($request->has('contraseña')) {
            $usuario->contraseña = $request->input('contraseña');
        }

        if($request->has('rol')) {
            $usuario->rol = $request->input('rol');
        }

        $usuario->save();
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return response()->json('Usuario eliminado');
    }
}
