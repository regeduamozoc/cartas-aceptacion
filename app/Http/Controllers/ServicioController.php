<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ServicioController extends Controller
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
            return view('servicio.agregarServicio');
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
                'Servicio'=>'required|string',
            ];

            $mensaje=[
                'required'=> 'Ingresar :attribute ',
            ];

            $this->validate($request, $campos, $mensaje);
            $datosServicio = request()->except('_token');
            
            Servicio::insert($datosServicio);
            return redirect('admin/servicio/agregarServicio')->with('mensaje', 'Dato guardado correctamente');
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
            return view('servicio.agregarServicio');
        }
        
    } 
}
