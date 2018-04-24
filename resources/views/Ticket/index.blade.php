@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">

              <form action="{{ route('ticket.index') }}" method="GET" >

                <div class="form-group">
                <input type="text"  name="s" id="s "class="form-control input-sm"  placeholder="Buscar Nombre o Descripcion" value="{{ isset($s) ? $s : '' }}">

                </div>

                <div>
                  <button class="btn btn-succes" type="submit">Buscador</button>
                </div>
                  </br>

              </form>

          <div class="pull-left"><h3>Lista Tickets</h3></div>



          <div class="pull-right">
            <div class="btn-group">
              <a href="{{route('ticket.create')}}" class="btn btn-info" >Añadir Tickets</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Descripcion</th>
               <th>Importancia</th>
               <th>FechaSol</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($tickets->count())
              @foreach($tickets as $ticket)
              <tr>
                <td>{{$ticket->nombre}}</td>
                <td>{{$ticket->descripcion}}</td>
                <td>{{$ticket->importancia}}</td>
                <td>{{$ticket->fechSol}}</td>

                <td><a class="btn btn-primary btn-xs" href="{{action('TicketController@edit', $ticket->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('TicketController@destroy', $ticket->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $tickets->appends(['s'=>$s])->links() }}
    </div>
  </div>
</section>

@endsection
