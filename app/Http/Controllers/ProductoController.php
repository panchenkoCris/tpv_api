<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tipo;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
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
            'cb_producto' => 'required',
            'existencias' => 'required',
            'precio' => 'required',
            'talla' => 'required',
            'color' => 'required',
            'id_tipo' => 'required',
            'descripcion' => 'required',
            'id_categoria' => 'required',
        ]);

        $producto = new Producto();

        $producto->cb_producto = $request->input('cb_producto');
        $producto->existencias = $request->input('existencias');
        $producto->precio = $request->input('precio');
        $producto->talla = $request->input('talla');
        $producto->color = $request->input('color');
        $producto->descripcion = $request->input('descripcion');

        $tipo = Tipo::find($request->input('id_tipo'));
        $categoria = Tipo::find($request->input('id_categoria'));

        if(!empty($tipo)) {
            $producto->id_tipo = $request->input('id_tipo');
        }

        if(!empty($categoria)) {
            $producto->id_categoria = $request->input('id_categoria');
        }

        $producto->save();
        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return response()->json($producto);
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

        $producto = Producto::find($id);

        if($request->has('cb_producto')) {
            $producto->talla = $request->input('cb_producto');
        }

        if($request->has('existencias')) {
            $producto->existencias = $request->input('existencias');
        }

        if($request->has('precio')) {
            $producto->precio = $request->input('precio');
        }

        if($request->has('id_tipo')) {
            $tipo = Tipo::find($request->input('id_tipo'));

            if(!empty($tipo)) {
                $producto->id_tipo = $request->input('id_tipo');
            }
        }

        if($request->has('id_categoria')) {
            $categoria = Tipo::find($request->input('id_categoria'));

            if(!empty($categoria)) {
                $producto->id_categoria = $request->input('id_categoria');
            }
        }

        if($request->has('talla')) {
            $producto->talla = $request->input('talla');
        }

        if($request->has('descripcion')) {
            $producto->descripcion = $request->input('descripcion');
        }

        if($request->has('color')) {
            $producto->color = $request->input('color');
        }

        $producto->save();

        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return response()->json('Producto eliminado');
    }
}
