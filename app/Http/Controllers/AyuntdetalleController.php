<?php

namespace App\Http\Controllers;

use App\Models\Ayuntdetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AyuntdetalleController extends Controller
{
    public function edit($id)
    {
        $role = Auth::user() -> role; 
        if($role=='1'){
            $ayuntdetalle=Ayuntdetalle::findOrFail($id);
            return view('ayuntamiento.periodos', compact('ayuntdetalle'));
        }
    }

    public function update(Request $request, $id)
    {
        $campos=[
            'anioIni'=>'required|integer',
            'anioFin'=>'required|integer',
            
        ];

        $mensaje=[
            'required'=> 'Ingresar :attribute ',
        ];

        $this->validate($request, $campos, $mensaje);

        $datos = request()->except(['_token','_method']);
        Ayuntdetalle::where('id','=',$id)->update($datos);

        $ayuntdetalle=Ayuntdetalle::findOrFail($id);
        
        return redirect('admin/ayuntamiento/'.$id.'/edit')->with('mensaje', 'Periodos modificados correctamente');
    }
}
