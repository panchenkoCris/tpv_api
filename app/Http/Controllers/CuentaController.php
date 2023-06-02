<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Ticket;
use App\Models\Producto;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $cuentas = Cuenta::all();
        return response()->json($cuentas);
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
            'id_usuario' => 'required',
            'id_descuento' => 'required'
        ]);

        $cuenta = new Cuenta();

        $cuenta->id_usuario = $request->input('id_usuario');
        $cuenta->id_descuento = $request->input('id_descuento');

        $cuenta->save();
        return response()->json($cuenta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOne($id)
    {
        $cuenta = Cuenta::find($id);
        return response()->json($cuenta);
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

        $cuenta = Cuenta::find($id);

        if($request->has('id_usuario')) {
            $cuenta->id_usuario = $request->input('id_usuario');
        }
        
        if($request->has('id_descuento')) {
            $cuenta->id_descuento = $request->input('id_descuento');
        }

        if($request->has('descuento_activado')) {
            $cuenta->descuento_activado = $request->input('descuento_activado');
        }
        
        $cuenta->save();
        return response()->json($cuenta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuenta = Cuenta::find($id);
        $cuenta->delete();
        return response()->json('Cuenta eliminada');
    }
}
