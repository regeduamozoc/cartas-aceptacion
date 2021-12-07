<title>Administrador - Agregar Instituciones</title>
<x-app-layout>
    <x-slot name="header">
        <center>
        <h3 class="font-semibold text-xl text-white leading-tight">
            {{ __('Añadir instituciones') }}
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
        <form action="{{ url('admin/institucion')}}" method="post" style="padding: 20px" enctype="multipart/form-data">
            @csrf
            <div class="container border border-1 bg-white row g-3" style="padding: 25px">
                <div class="col-md-6">
                    <label for="institucion" class="form-label"> Nombre de institucion </label>
                    <input type="text" class="form-control border border-2" name="institucion" value="{{ isset($institucion ->institucion)?$institucion->institucion:old('institucion') }}" id="institucion">
                </div>
                    <br>
                <div class="col-md-6">
                    <label for="destinatario" class="form-label"> Destinatario* </label>
                    <input type="text" class="form-control border border-2" name="destinatario" value="{{ isset($institucion ->destinatario)?$institucion->destinatario:old('destinatario') }}" id="destinatario">
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <label for="cargo" class="form-label"> Cargo* </label>
                    <input type="text" class="form-control border border-2" name="cargo" value="{{ isset($institucion ->cargo)?$institucion->destinatario:old('cargo') }}" id="cargo">
                </div>
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