<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $tipos = Tipo::all();
        return response()->json($tipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'nombre_tipo' => 'required'
        ]);

        $tipo = new Tipo();

        $tipo->nombre_tipo = $request->input('nombre_tipo');
        $tipo->longitud_tipo = $request->input('longitud_tipo');

        $tipo->save();

        return response()->json($tipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOne($id)
    {
        $tipo = Tipo::find($id);
        return response()->json($tipo);
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

        $tipo = Tipo::find($id);

        if($request->has('nombre_tipo')) 
        {
            $tipo->nombre_tipo = $request->input('nombre_tipo');
        } 

        if($request->has('longitud_tipo'))
        {
            $tipo->longitud_tipo = $request->input('longitud_tipo');
        }

        $tipo->save();

        return response()->json($tipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = Tipo::find($id);
        $tipo->delete();
        return response()->json('Tipo eliminado');
    }
}
