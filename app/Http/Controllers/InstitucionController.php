<?php

namespace App\Http\Controllers;

use App\Models\Institucion; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitucionController extends Controller
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
            return view('institucion.agregarInst');
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
                'institucion'=>'required|string',
                'destinatario'=>'required|string',
                'cargo'=>'required|string',
            ];

            $mensaje=[
                'required'=> 'Ingresar :attribute ',
            ];

            $this->validate($request, $campos, $mensaje);
            $datosInstitucion = request()->except('_token');
            
            Institucion::insert($datosInstitucion);
            return redirect('admin/institucion/agregarInst')->with('mensaje', 'Datos guardados correctamente');
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
            return view('institucion.agregarInst');
        }
        
    }


}


 
