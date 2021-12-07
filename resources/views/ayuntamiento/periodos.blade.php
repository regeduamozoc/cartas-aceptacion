<title>Editar periodo - Ayuntamiento</title>
<x-app-layout>
    <x-slot name="header">
        <center>
        <h3 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Periodos') }}
        </h3>
        </center>
    </x-slot>
    <div class="container">    
        <form action="{{ url('admin/ayuntamiento/'.$ayuntdetalle->id ) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}

        <br>
        <br>
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <br>
        <div class="container border border-1 bg-white row g-3" style="padding: 25px">
            <center>
            <div class="col-md-4">
                <label for="anioIni" class="form-label"> Año de inicio: </label>
                <input type="text" class="form-control" name="anioIni" value="{{ isset($ayuntdetalle ->anioIni)?$ayuntdetalle->anioIni:old('anioIni') }}" id="anioIni">
            </div>
                <br>
            <div class="col-md-4">
                <label for="anioFin" class="form-label"> Año de fin: </label>
                <input type="text" class="form-control" name="anioFin" value="{{ isset($ayuntdetalle ->anioFin)?$ayuntdetalle->anioFin:old('anioFin') }}" id="anioFin">
            </div>  
                <br>
            
            
                <input type="submit" value="Guardar cambios" class="btn btn-outline-danger">
                <a href="{{ url('admin')}}" class="btn btn-outline-dark"> Regresar </a>
                <br>   
            </center>
        </div>

        </form>
    </div>
</x-app-layout>

