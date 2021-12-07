<title>Administrador - Agregar Carreras</title>
<x-app-layout>
    <x-slot name="header">
        <center>
        <h3 class="font-semibold text-xl text-white leading-tight">
            {{ __('Añadir Carreras') }}
        </h3>
        </center>
    </x-slot>
    <div class="container">
    <br>
    <br>
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
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif  
        <form action="{{ url('admin/carrera')}}" method="post" style="padding: 20px" enctype="multipart/form-data">
            @csrf
            <div class="container border border-1 bg-white row g-3" style="padding: 25px">
                <div class="col-md-6">
                    <label for="Carrera" class="form-label"> Carrera: </label>
                    <input type="text" class="form-control border border-2" name="Carrera" value="{{ isset($carrera ->Carrera)?$carrera->Carrera:old('Carrera') }}" id="Carrera">
                </div>
                    <br>
            </div>
    <br>
    <br>
            <center>
                <input type="submit" value="Guardar" class="btn btn-outline-danger">
                <a href="{{ url('admin') }}" class="btn btn-outline-dark"> Regresar </a>
                <br>   
            </center>
        </form>
    </div>
</x-app-layout>