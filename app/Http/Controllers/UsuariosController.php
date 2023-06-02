<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use Auth;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
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
    public function create(Request $request)
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
        $contraseñaSalteada = Hash::make($request->input('contraseña'));
        $usuario->contraseña = $contraseñaSalteada;
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
    public function showOne($id)
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



    /**
     * authenticate that the user's information passed by parameters
     * exists in the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'correo' => 'required',
            'contraseña' => 'required'
        ]);

        $correo = $request->input('correo');
        $contraseña_parametro = $request->input('contraseña');

        $usuario = DB::table('usuarios')->where(['correo'=> $correo])->first();

        if(!empty($usuario)) {
            if(Hash::check($contraseña_parametro, $usuario->contraseña)) {
                return response()->json($usuario);
            } else {
                return response()->json("Error");
            }            
        } else {
            return response()->json("No existe");
        }
    }
}
