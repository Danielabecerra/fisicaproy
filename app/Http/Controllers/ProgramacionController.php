<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App;

class ProgramacionController extends Controller
{ 
    public function __construct()
	{
		$this->middleware('auth');
	}


    public function formulariop()
    {
        $programarlabs = App\Programarlab::paginate(5);
        return view('programacion', compact ('programarlabs'));
    }
   

    public function materiatodo()
    {
        $materias = App\Materia::all();
        $docentes = App\Docente::all();
        $programarlabs = App\Programarlab::paginate(5);
        
        return view('programacion', compact ('materias', 'programarlabs', 'docentes'));
    }
    
   
    public function crear(Request $request)
    {
        //dd($request);
        //return $request->all();
        $this->validate($request, [
            'id_m' => 'required',
            'id_d' => 'required',
            'id_h' => 'required',
            'grupo'=> 'required',
            'ambiente'=> 'required',
            'gestion'=> 'required',
            'cupo_max' => 'required',
           
        ]);
      
        $programacionNueva = new App\Programarlab;
        $programacionNueva->id_m = $request->id_m;
        $programacionNueva->id_d = $request->id_d;
        $programacionNueva->id_h = $request->id_h;
        $programacionNueva->grupo = $request->grupo;
        $programacionNueva->ambiente = $request->ambiente;
        $programacionNueva->gestion = $request->gestion;
        $programacionNueva->cupo_max = $request->cupo_max;
     
        $programacionNueva->save();

        return back()->with('mensaje', 'Programacion realizada');
    }



    public function editar($id)
    {
        $materias = App\Materia::all();
        $programarlabs = App\Programarlab::findOrFail($id);
        return view('editar_programacion', compact('programarlabs', 'materias'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_m' => 'required',
            'id_d' => 'required',
            'id_h' => 'required',
            'grupo'=> 'required',
            'ambiente'=> 'required',
            'gestion'=> 'required',
            'cupo_max' => 'required',
           
        ]);
        $programacionUpdate = new App\Programarlab;
        $programacionUpdate->id_m = $request->id_m;
        $programacionUpdate->id_d = $request->id_d;
        $programacionUpdate->id_h = $request->id_h;
        $programacionUpdate->grupo = $request->grupo;
        $programacionUpdate->ambiente = $request->ambiente;
        $programacionUpdate->gestion = $request->gestion;
        $programacionUpdate->cupo_max = $request->cupo_max;
     
        $programacionUpdate->save();
        return back()->with('mensaje', 'programacion editada');
    }
    
    
    
    public function eliminar($id)
    {
        $programacionEliminar = App\Programarlab::findOrFail($id);
        $programacionEliminar->delete();

        return back()->with('mensaje', 'Programacion Eliminada');
 
    }
    
}