<title>Administrador - Nuevo estudiante</title>
<x-app-layout>
    <x-slot name="header">
        <center>
        <h3 class="font-semibold text-xl text-white leading-tight">
            {{ __('Añadir estudiante') }}
        </h3>
        </center>
    </x-slot>
    <div class="container">
        <form action="{{ url('/admin')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.form',['modo'=>'Agregar'])
        </form>
    </div>
</x-app-layout>
