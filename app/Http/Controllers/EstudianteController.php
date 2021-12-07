<?php
 
namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Institucion;
use App\Models\Carrera;
use App\Models\Servicio;
use App\Models\Proyecto;
use App\Models\Ayuntdetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
            return view('admin.index', compact('estudiantes', 'busqueda'));
        }
        if($role=='0'){
            //SELECT estudiantes.nombre FROM users INNER JOIN estudiantes ON users.id=estudiantes.Usuario;
            /*$id = Auth::user()->id;
            $estudiantes = Estudiante::join('users', 'estudiantes.User', '=', $id)
                    ->get(['estudiantes.*']);
            return view('alumno.index', compact('estudiantes'));
            $estudiantes['estudiantes'] = DB::table('users')
                ->join('estudiantes', $id , '=', 'estudiantes.Usuario')
                
                ->select('users.id','estudiantes.*') 
                ->get();*/
            return view('alumno.index', /*compact('estudiantes')*/);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user() -> role;
        if($role=='1'){
            $instituciones= Institucion::all();
            $carreras= Carrera::all();
            $servicios=Servicio::all();
            $proyectos= Proyecto::all();
            return view('admin.create', compact('instituciones', 'carreras', 'servicios', 'proyectos'));
        }
        $role = Auth::user() -> role;
        if($role=='0'){
            $instituciones= Institucion::all();
            $carreras= Carrera::all();
            $servicios= Servicio::all();
            return view('alumno.solicitar', compact('instituciones', 'carreras', 'servicios'));
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
                'Nombre'=>'required|string|max:100',
                'ApellidoPaterno'=>'required|string|max:100',
                'ApellidoMaterno'=>'required|string|max:100',
                'Matricula'=>'required|int',
                'id_institucion'=>'required|int|not_in:0',
                'id_carrera'=>'required|int|not_in:0',
                'id_servicio'=> 'required|int|not_in:0',
                'id_proyecto'=>'required|int|not_in:0',
            ];

            $mensaje=[
                'required'=> 'Ingresar :attribute ',
            ];

            $this->validate($request, $campos, $mensaje);
            $datosEstudiante = request()->except('_token');
            
            Estudiante::insert($datosEstudiante);
            return redirect('admin')->with('mensaje', 'Estudiante agregado');
        }
        if($role=='0'){
            $campos=[
                'Nombre'=>'required|string|max:100',
                'ApellidoPaterno'=>'required|string|max:100',
                'ApellidoMaterno'=>'required|string|max:100',
                'Matricula'=>'required|int',
                'CartaP'=>'required',
                'id_institucion'=>'required|int|not_in:0',
                'id_carrera'=>'required|int|not_in:0',
                'id_servicio'=> 'required|int|not_in:0',
            ];

            $mensaje=[
                'required'=> 'Ingresar :attribute ',
                'CartaP.required'=> 'Inserte carta de presentacion', 
            ];

            $this->validate($request, $campos, $mensaje);
            $datosEstudiante = request()->except('_token');

            if($request->hasFile('CartaP')){
                $datosEstudiante['CartaP']=$request->file('CartaP')->store('uploads', 'public');
            }
            
            Estudiante::insert($datosEstudiante);
            return redirect('alumno')->with('mensaje', 'Datos enviados correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante=Estudiante::findOrFail($id);
        return view('admin.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Auth::user() -> role; 
        if($role=='1'){
            $estudiante=Estudiante::findOrFail($id);
            $instituciones= Institucion::all();
            $carreras= Carrera::all();
            $servicios= Servicio::all();
            $proyectos= Proyecto::all();
            return view('admin.edit', compact('estudiante', 'instituciones', 'carreras', 'servicios', 'proyectos') );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'id_institucion'=>'required|int|not_in:0',
            'Matricula'=>'required|int',
            'id_institucion'=>'required|int|not_in:0',
            'id_carrera'=>'required|int|not_in:0',
            'id_proyecto'=>'required|int|not_in:0',
            
        ];

        $mensaje=[
            'required'=> 'Ingresar :attribute ',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosEstudiante = request()->except(['_token','_method']);
        Estudiante::where('id','=',$id)->update($datosEstudiante);

        $estudiante=Estudiante::findOrFail($id);
        
        return redirect('admin/'.$id.'/edit')->with('mensaje', 'Datos modificados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::destroy($id);
        return redirect('admin')->with('mensaje','Eliminado con éxito');
    }

    public function GenerarCarta($id)
    {
        $role = Auth::user() -> role; 
        if($role=='1'){
            $periodo=Ayuntdetalle::all();
            $estudiante=Estudiante::findOrFail($id);
            return view('admin.GenerarCarta', compact('estudiante', 'periodo'));
        }
    }

    public function cartaPDF($id)
    {
        $role = Auth::user() -> role; 
        if($role=='1'){
            $periodo=Ayuntdetalle::all();
            $estudiante=Estudiante::findOrFail($id);
            $pdf = PDF::loadView('admin.GenerarCarta', ['estudiante'=>$estudiante], ['periodo'=>$periodo]);
            return $pdf->stream();
        }
    }
    
}
