<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $role = Auth::user() -> role;
        if($role=='1'){
            $busqueda=trim($request->get('busqueda'));
            $estudiantes=DB::table('estudiantes')
                        ->select('id', 'Nombre', 'ApellidoPaterno', 'ApellidoMaterno')
                        ->where('Nombre', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('ApellidoPaterno', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('ApellidoMaterno', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('ApellidoPaterno', 'asc')
                        ->paginate(5);
            //$datos['estudiantes']=Estudiante::paginate(5);
            return view('admin.index', compact('estudiantes', 'busqueda'));
        }
       
        if($role=='0'){
            return view('alumno.index');
        }
        else{
            return view('auth.login');
        }
    }
}