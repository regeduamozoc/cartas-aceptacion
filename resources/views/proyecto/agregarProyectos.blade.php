<title>Administrador - Agregar Proyectos</title>
<x-app-layout>
    <x-slot name="header">
        <center>
        <h3 class="font-semibold text-xl text-white leading-tight">
            {{ __('Añadir Proyectos') }}
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
        <form action="{{ url('admin/proyecto')}}" method="post" style="padding: 20px" enctype="multipart/form-data">
            @csrf
            <div class="container border border-1 bg-white row g-3" style="padding: 25px">
                <div class="col-md-6">
                    <label for="Proyecto" class="form-label"> Nombre de proyecto: </label>
                    <input type="text" class="form-control border border-2" name="Proyecto" value="{{ isset($proyecto ->Proyecto)?$proyecto->Proyecto:old('Proyecto') }}" id="Proyecto">
                </div>
                    <br>
                <div class="col-md-3">
                    <label for="Folio" class="form-label"> Folio: </label>
                    <input type="text" class="form-control border border-2" name="Folio" value="{{ isset($proyecto ->Folio)?$proyecto->Folio:old('Folio') }}" id="Folio">
                </div>
                <br>
                <div class="col-md-2">
                    <label for="Duracion" class="form-label"> Duración (hrs): </label>
                    <input type="text" class="form-control border border-2" name="Duracion" value="{{ isset($proyecto ->Duracion)?$proyecto->Duracion:old('Duracion') }}" id="Duracion">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="MesInicio" class="form-label"> Del mes: </label>
                    <select class="form-control border border-2" name="MesInicio" id="MesInicio">
                        <option value="0">--Seleccionar mes de inicio--</option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
                </div>
                <br>
                <div class="col-md-6">
                    <label for="MesFin" class="form-label"> Al: </label>
                    <select class="form-control border border-2" name="MesFin" id="MesFin">
                        <option value="0">--Seleccionar mes de inicio--</option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
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