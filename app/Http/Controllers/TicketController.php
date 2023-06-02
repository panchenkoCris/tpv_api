<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Usuarios;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
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
            'fecha' => 'required',
            'registrado' => 'required'
        ]);

        $ticket = new Ticket();

        $ticket->fecha = $request->input('fecha');
        $ticket->registrado = $request->input('registrado');
        if($request->has('id_usuario')) {
            if($request->input('id_usuario') != 0) {
                $ticket->id_usuario = $request->input('id_usuario');
            }            
        }

        $ticket->save();

        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOne($id)
    {
        $ticket = Ticket::find($id);
        return response()->json($ticket);
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
        $this->validate($request,[]);

        $ticket = Ticket::find($id);

        if($request->has('fecha')) {
            $ticket->fecha = $request->input('fecha');
        }
        
        if($request->has('registrado')) {
            $ticket->registrado = $request->input('registrado');
        }
        
        if($request->has('id_usuario')) {
            $id_usuario = $request->input('id_usuario');
            if($id_usuario != 0) {
                $usuario = Usuarios::find($id_usuario);
                if(!empty($usuario)) {
                    $ticket->id_usuario = $request->input('id_usuario');
                }
            }            
        }

        $ticket->save();

        return response()->json($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json('Ticket eliminado');
    }
}
