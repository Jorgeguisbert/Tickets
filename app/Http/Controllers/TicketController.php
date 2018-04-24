<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $s = $request->input('s');
       $tickets=Ticket::orderBy('id','DESC')
       ->search($s)
       ->paginate(3);
      return view('Ticket.index',compact('tickets','s'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required', 'descripcion'=>'required', 'importancia'=>'required|in:Urgente,Media,Baja']);
        Ticket::create($request->all());
        return redirect()->route('ticket.index')->with('succes','Registro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets=Ticket::find($id);
        return view('ticket.show',compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket=Ticket::find($id);
        return view('ticket.edit',compact('ticket'));
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
        $this->validate($request,[ 'nombre'=>'required', 'descripcion'=>'required', 'importancia'=>'required|in:Urgente,Media,Baja']);
        Ticket::find($id)->update($request->all());
          return redirect()->route('ticket.index')->with('succes','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('ticket.index')->with('succes','Registro eliminado');
    }

    public function localizar(Request $request){
          //dd($request->all());

          $tickets=Ticket::
          $ubicacions = Ubicacion::where('nombre','LIKE','%'.$request->Bu.'%')->get();
          dd($ubicacions);
         return redirect()->route('ubicacion.index')->with('succes','Encontrado');
          }



}
