<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lineaticket;
use App\Models\Ticket;
use App\Models\Producto;

class LineaticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $lineatickets = Lineaticket::all();
        return response()->json($lineatickets);
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
            'cb_producto' => 'required'
        ]);

        $lineaticket = new Lineaticket();

        $producto = Producto::find($request->input('cb_producto'));
        if(!empty($producto)) {
            $lineaticket->cb_producto = $request->input('cb_producto');
        }

        if($request->has('id_ticket')) {
            $id_ticket = $request->input('id_ticket');
            if($id_ticket != 0) {
                $ticket = Ticket::find($id_ticket);
                if(!empty($ticket)) {
                    $lineaticket->id_ticket = $request->input('id_ticket');
                }
            }
        }

        $lineaticket->save();
        return response()->json($lineaticket);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOne($id)
    {
        $lineaticket = Lineaticket::find($id);        
        return response()->json($lineaticket);
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

        $lineaticket = Lineaticket::find($id);

        if($request->has('cb_producto')) {
            $producto = Producto::find($request->input('cb_producto'));
            if(!empty($producto)) {
                $lineaticket->cb_producto = $request->input('cb_producto');
            }
        }

        if($request->has('id_ticket')) {
            $id_ticket = $request->input('id_ticket');
            if($id_ticket != 0) {
                $ticket = Ticket::find($id_ticket);
                if(!empty($ticket)) {
                    $lineaticket->id_ticket = $request->input('id_ticket');
                }
            }
        }

        $lineaticket->save();
        return response()->json($lineaticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lineaticket = Lineaticket::find($id);
        $lineaticket->delete();
        return response()->json('Linea ticket eliminada');
    }

    public function showAllProductsByTicket(Request $request)
    {
        $this->validate($request, [
            'id_ticket' => 'required'
        ]);

        $ticket = $request->input('id_ticket');
    }
}
