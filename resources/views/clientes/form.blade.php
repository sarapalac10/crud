{{-- Formulario que va a relacionar create y edit --}}

<h1>{{ $modo }} cliente </h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>    {{ $error }} </li>
            @endforeach
        </ul>    
    </div>
@endif    


<div class="form-group">
<label for="Nombres">Nombre: </label>
<input class="form-control" type="text" name="Nombres" id="Nombres" value="{{ isset($cliente->Nombres)?$cliente->Nombres:old('Nombres') }}"
placeholder="Introduce tu nombre"> 
</div>

<div class="form-group">
<label for="Apellidos">Apellidos: </label>
<input class="form-control" type="text" name="Apellidos" id="Apellidos" value="{{ isset($cliente->Apellidos)?$cliente->Apellidos:old('Apellidos') }}"
placeholder="Introduce tus apellidos">  
</div>

<div class="form-group">
<label for="Documento">Documento: </label>
<input class="form-control" type="number" name="Documento" id="Documento" value="{{ isset($cliente->Documento)?$cliente->Documento:old('Documento') }}"
placeholder="Introduce tu documento"> 
</div>

<div class="form-group">
<label for="email">Correo: </label>
<input class="form-control" type="email" name="Correo" id="Correo" value="{{ isset($cliente->Correo)?$cliente->Correo:old('Correo') }}"
placeholder="Introduce tu correo electrónico"> </br>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} registro">


<a href="{{ url('/clientes/') }}" class="btn btn-primary" >Regresar</a>