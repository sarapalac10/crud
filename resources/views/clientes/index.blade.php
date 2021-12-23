@extends('layouts.app')
@section('content')
<div class="container">
   
@if (Session::has('mensaje'))
    <div class="alert alert-sucess alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}   
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button> --}}
    </div>
@endif
       
<a href="{{ url('/clientes/create') }}" class="btn btn-success">Registrarse como nuevo cliente</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($clientes as $cliente)
            
        <tr>
            <td>{{ $cliente->id}}</td>
            <td>{{ $cliente->Nombres}}</td>
            <td>{{ $cliente->Apellidos}}</td>
            <td>{{ $cliente->Documento}}</td>
            <td>{{ $cliente->Correo}}</td>
            <td>
                <form action="{{ url('clientes/'.$cliente->id.'/edit')}}" method="get" class="d-inline">
                    <input class="btn btn-warning" type="submit" value="Editar">
                </form>
                

                <form action="{{ url('/clientes/'.$cliente->id )}}"  method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}    
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar el registro?')" value="Borrar" >

                </form>
                


            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

{!! $clientes->links() !!}

</div>
@endsection