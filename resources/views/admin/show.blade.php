<title>Detalles</title>
<x-app-layout>
    <x-slot name="header">
    <center>
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Detalles') }}
        </h2>
    </center>
    </x-slot>
    <div class="container" style="margin-top: 30px">
        <div class="row">
        <div class="col col-6 "> 
            <div class="card">
                
                <div class="card-body text-center">
                <h6 class="font-semibold text-gray leading-tight">Nombre completo</h6>
                    {{ ucwords($estudiante ->Nombre) }}
                    {{ ucwords($estudiante ->ApellidoPaterno) }}
                    {{ ucwords($estudiante ->ApellidoMaterno) }}
                <br>
                <br>
                <h6 class="font-semibold text-gray leading-tight">Matricula</h6>
                {{ $estudiante ->Matricula }}
                <br>
                <br>
                <h6 class="font-semibold text-gray leading-tight">Institucion</h6>
                {{ $estudiante ->institucions ->institucion }}
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6 class="font-semibold text-gray leading-tight">Carrera</h6>
                            {{ ucwords($estudiante ->carreras ->Carrera) }}
                            <br> 
                        </div>
                        <div class="col">
                            <h6 class="font-semibold text-gray leading-tight">Servicio: </h6>
                            {{ ucwords($estudiante ->servicios ->Servicio) }}
                            <br>
                        </div>
                        <br>
                    </div>
                </div>
                @if(isset($estudiante-> proyectos ->Proyecto))
                <h6 class="font-semibold text-gray leading-tight">Proyecto asignado:</h6>
                {{ ucwords($estudiante ->proyectos ->Proyecto) }}
                <br>
                @endif
                @if(!isset($estudiante-> proyectos ->Proyecto))
                <h6 class="font-semibold text-danger leading-tight">Sin proyecto*</h6>
                <br>
                @endif
                </div>
                <div style="margin:10px">
                <center>
                @if(isset($estudiante-> proyectos ->Proyecto))
                <a href=" {{ url('/admin/GenerarCarta/'.$estudiante->id) }} " class="btn btn-dark">
                    Generar carta
                </a>
                @endif 
                <a href="{{ url('/admin/'.$estudiante->id.'/edit') }} " class="btn btn-outline-danger">
                    Editar
                </a>
                <a href="{{ url('admin') }} " class="btn btn-outline-dark">
                    Regresar
                </a></center></div>
            </div>        
        </div>
        @if(isset($estudiante-> CartaP))
        <div class="col col-6 float-md-end">
            <iframe style="width:100%; height:100%" src="{{ asset('storage').'/'.$estudiante->CartaP }}" frameborder="0"></iframe>
        </div>
        @endif
        </div>
    </div>
    
</x-app-layout>