<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CarreraController extends Controller
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
            return view('carrera.agregarCarrera');
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
                'Carrera'=>'required|string',
            ];

            $mensaje=[
                'required'=> 'Ingresar :attribute ',
            ];

            $this->validate($request, $campos, $mensaje);
            $datosCarrera = request()->except('_token');
            
            Carrera::insert($datosCarrera);
            return redirect('admin/carrera/agregarCarrera')->with('mensaje', 'Carrera agregada correctamente');
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
            return view('carrera.agregarCarrera');
        }
        
    } 
}
