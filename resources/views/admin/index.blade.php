<title>Administrador</title>
<x-app-layout>
    <x-slot name="header">
        <center><h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Administrador') }}
        </h2> </center>
    </x-slot>
<br>
<div class="container">
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif 
        
    <form action="{{ route('admin.index') }}" method="get" >
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-5">
                    <a href="{{ url('admin') }}" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                    </svg></a>
                    <a href="{{ url('admin/create') }}" class="btn btn-outline-secondary">Agregar nuevo</a>
                </div>
                <div class="col col-lg-7">
                    <div class="input-group mb-3">
                            <input type="text" value="{{ $busqueda }}" class="form-control" name="busqueda">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-outline-danger" value="Buscar" name="buscar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <table class="table table-hover text-center bg-white">
        <thead class="thead-light">
            <tr>
                <th class="font-bold">NOMBRE COMPLETO</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach( $estudiantes as $estudiante)
            <tr>
                <td style="padding: 15px">
                    <a href="{{ url('/admin/'.$estudiante->id) }}" class="text-decoration-none text-black"> 
                    <h6 class="font-semibold text-gray leading-tight">
                    {{ ucwords( $estudiante -> Nombre ) }}
                    {{ ucwords( $estudiante -> ApellidoPaterno ) }}
                    {{ ucwords( $estudiante -> ApellidoMaterno ) }}
                    </h6>
                    </a>
                </td>
                <td> 
                    <a href=" {{ url('/admin/GenerarCarta/'.$estudiante->id) }} " class="btn btn-outline-dark">
                        Generar carta
                    </a>
                    <form action="{{ url('/admin/'.$estudiante->id) }}" class="d-inline" method="post"> 
                        @csrf
                        {{ method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('Eliminar?')" value="Eliminar" class="btn btn-outline-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $estudiantes->links() !!}
</div>
</x-app-layout>
