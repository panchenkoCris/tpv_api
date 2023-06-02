<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descuento;

class DescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $descuentos = Descuento::all();
        return response()->json($descuentos);
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
            'descripcion' => 'required',
            'cantidad_descuento' => 'required'
        ]);

        $descuento = new Descuento();

        $descuento->descripcion = $request->input('descripcion');
        $descuento->cantidad_descuento = $request->input('cantidad_descuento');

        $descuento->save();

        return response()->json($descuento);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOne($id)
    {
        $descuento = Descuento::find($id);
        return response()->json($descuento);
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

        $descuento = Descuento::find($id);

        if($request->has('descripcion')) {
            $descuento->descripcion = $request->input('descripcion');
        }
        
        if($request->has('cantidad_descuento')) {
            $descuento->cantidad_descuento = $request->input('cantidad_descuento');
        }

        $descuento->save();

        return response()->json($descuento);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $descuento = Descuento::find($id);
        $descuento->delete();
        return response()->json('Descuento eliminado');
    }
}
