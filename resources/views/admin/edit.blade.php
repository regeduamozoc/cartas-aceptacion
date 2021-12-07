<title>Administrador - Editar</title>
<x-app-layout>
    <x-slot name="header">
        <center>
        <h3 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar') }}
        </h3>
        </center>
    </x-slot>
    <div class="container">    
        <form action="{{ url('/admin/'.$estudiante->id ) }}" method="post">
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
            <div class="col-md-4">
                <label for="Nombre" class="form-label"> Nombre (s) </label>
                <input type="text" class="form-control" name="Nombre" value="{{ isset($estudiante ->Nombre)?$estudiante->Nombre:old('Nombre') }}" id="Nombre">
            </div>
                <br>
            <div class="col-md-4">
                <label for="ApellidoP" class="form-label"> Apellido Paterno </label>
                <input type="text" class="form-control" name="ApellidoPaterno" value="{{ isset($estudiante ->ApellidoPaterno)?$estudiante->ApellidoPaterno:old('ApellidoPaterno') }}" id="ApellidoPaterno">
            </div>  
                <br>
            <div class="col-md-4">
                <label for="ApellidoM" class="form-label"> Apellido Materno </label>
                <input type="text" class="form-control" name="ApellidoMaterno" value="{{ isset($estudiante ->ApellidoMaterno)?$estudiante->ApellidoMaterno:old('ApellidoMaterno') }}" id="ApellidoMaterno">
                <br>
            </div>
            <div class="col-md-5">
                <label for="Matricula" class="form-label"> Matricula </label>
                <input type="text" class="form-control" name="Matricula" value="{{ isset($estudiante ->Matricula)?$estudiante->Matricula:old('Matricula') }}" id="Matricula">
            </div>
            
            <div class="col-md-6">
                <label for="Institucion" class="form-label"> Institución </label>
                <select type="text" class="form-control" name="id_institucion" id="id_institucion">
                    <option value="{{ $estudiante->id_institucion }}"> {{ ucwords($estudiante->institucions->institucion) }} </option>
                    @foreach($instituciones as $institucion)
                    <option value="{{ $institucion['id'] }}">{{ ucwords($institucion['institucion']) }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col-md-4">
            <label for="Carrera" class="form-label"> Carrera </label>
                <select type="text" class="form-control" name="id_carrera" id="id_carrera">
                    <option value="{{ $estudiante->id_carrera }}"> {{ ucwords($estudiante->carreras->Carrera) }} </option>
                    @foreach($carreras as $carrera)
                    <option value="{{ $carrera['id'] }}">{{ ucwords($carrera['Carrera']) }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col-md-4">
            <label for="Servicio" class="form-label"> Servicio a prestar: </label>
                <select type="text" class="form-control" name="id_servicio" id="id_servicio">
                    <option value="{{ $estudiante->id_servicio }}"> {{ ucwords($estudiante->servicios->Servicio) }} </option>
                    @foreach($servicios as $servicio)
                    <option value="{{ $servicio['id'] }}">{{ ucwords($servicio['Servicio']) }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col-md-4">
            <label for="Proyecto" class="form-label"> Asignar proyecto </label>
                <select type="text" class="form-control" name="id_proyecto" id="id_proyecto">
                @if(isset($estudiante-> proyectos ->Proyecto))
                    <option value="{{ $estudiante->id_proyecto }}"> {{ ucwords($estudiante->proyectos->Proyecto) }} </option>
                @endif
                    <option value="0">-- Asignar proyecto --</option>
                    @foreach($proyectos as $proyecto)
                    <option value="{{ $proyecto['id'] }}">{{ ucwords($proyecto['Proyecto']) }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <center>
                <input type="submit" value="Guardar cambios" class="btn btn-outline-danger">
                <a href="{{ url('/admin/'.$estudiante->id) }}" class="btn btn-outline-dark"> Regresar </a>
                <br>   
            </center>
        </div>

        </form>
    </div>
</x-app-layout>

