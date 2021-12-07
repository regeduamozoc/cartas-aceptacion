<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ProyectoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user() -> role;
        if($role=='1'){
            return view('proyecto.agregarProyectos');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Auth::user() -> role;
        if($role=='1'){
            $campos=[
                'Proyecto'=>'required|string',
                'Folio'=>'required|integer',
                'Duracion'=>'required|integer',
                'MesInicio'=>'required|string',
                'MesFin'=>'required|string',
            ];

            $mensaje=[
                'required'=> 'Ingresar :attribute ',
            ];

            $this->validate($request, $campos, $mensaje);
            $datosProyecto = request()->except('_token');
            
            Proyecto::insert($datosProyecto);
            return redirect('admin/proyecto/agregarProyectos')->with('mensaje', 'Proyecto registrado correctamente');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $role = Auth::user() -> role; 
        if($role=='1'){
            return view('proyecto.agregarProyectos');
        }
        
    }
}
