<title>Solicitar Carta</title>
<x-app-layout>
    <x-slot name="header">
    <center><h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Solicitar') }}
        </h2></center>
    </x-slot>
<div class="container">
    <br>
    <br>
    <form action="{{ url('/alumno')}}" method="post" enctype="multipart/form-data"> 
    @csrf
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

    <div class="container border border-1 bg-white row g-3" style="padding: 25px">
        <div class="col-md-4">
            <label for="Nombre" class="form-label"> Nombre (s) </label>
            <input type="text" class="form-control border border-2" name="Nombre" value="{{ isset($estudiante ->Nombre)?$estudiante->Nombre:old('Nombre') }}" id="Nombre">
        </div>
            <br>
        <div class="col-md-4">
            <label for="ApellidoP" class="form-label"> Apellido Paterno </label>
            <input type="text" class="form-control border border-2" name="ApellidoPaterno" value="{{ isset($estudiante ->ApellidoPaterno)?$estudiante->ApellidoPaterno:old('ApellidoPaterno') }}" id="ApellidoPaterno">
        </div>  
            <br>
        <div class="col-md-4">
            <label for="ApellidoM" class="form-label"> Apellido Materno </label>
            <input type="text" class="form-control border border-2" name="ApellidoMaterno" value="{{ isset($estudiante ->ApellidoMaterno)?$estudiante->ApellidoMaterno:old('ApellidoMaterno') }}" id="ApellidoMaterno">
            <br>
        </div>
        <div class="col-md-3">
            <label for="Matricula" class="form-label"> Matricula </label>
            <input type="text" class="form-control border border-2" name="Matricula" value="{{ isset($estudiante ->Matricula)?$estudiante->Matricula:old('Matricula') }}" id="Matricula">
        </div>
        <br>
        <!--Mandar el id del usuario en sesion-->
        
            <input type="hidden" class="form-control border border-2" name="Usuario" value="{{ auth()->user()->id }}" id="Usuario">
        
        <div class="col-md-5">
            <label for="Institucion" class="form-label"> Institución </label>
            <select type="text" class="form-control border border-2" name="id_institucion" id="id_institucion">
                <option value="0"> --- Institucion --- </option>
                @foreach($instituciones as $institucion)
                <option value="{{ $institucion['id'] }}">{{ ucwords($institucion['institucion']) }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="col-md-4">
        <label for="Carrera" class="form-label"> Carrera </label>
            <select type="text" class="form-control border border-2" name="id_carrera" id="id_carrera">
                <option value="0"> --- Carrera --- </option>
                @foreach($carreras as $carrera)
                <option value="{{ $carrera['id'] }}">{{ ucwords($carrera['Carrera']) }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="col-md-5">
        <label for="Servicio" class="form-label"> Servicio a prestar: </label>
            <select type="text" class="form-control border border-2" name="id_servicio" id="id_servicio">
                <option value="0"> --- Servicio --- </option>
                @foreach($servicios as $servicio)
                <option value="{{ $servicio['id'] }}">{{ ucwords($servicio['Servicio']) }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="col-md-5">
        <label for="CartaP" class="form-label">Carta de presentacion</label>
        <input class="form-control border border-2" type="file" name="CartaP" id="CartaP">
        <br>
            <input type="submit" value="Enviar" class="btn btn-outline-danger">
            <a href="{{ url('admin/') }}" class="btn btn-outline-dark"> Regresar </a>
            <br>   
        </div>
        
    </div>
    </form>
</div>
</x-app-layout>