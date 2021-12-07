<title> Estudiantes </title>
<x-app-layout>
    <x-slot name="header">
    <center><h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Estudiante') }}
        </h2></center>
    </x-slot>
<div class="container">
        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <center>
    <div class="card" style="margin-top:20px">
        <div class="card-body" style="padding:50px">
        <a class="btn btn-outline-dark" href="{{ url('alumno/create') }}">Solicitar carta de aceptación</a>
        <br>
        </div>
    </div>
    <div class="card" style="margin-top:20px">
        <div class="card-body" style="padding:50px">
        
        <br>
        </div>
    </div>
    </center>
</div>
</x-app-layout>
