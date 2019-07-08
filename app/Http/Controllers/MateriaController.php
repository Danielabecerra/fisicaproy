<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class MateriaController extends Controller{
    
    /*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
    public function __construct()
	{
		$this->middleware('auth');
    }
    public function detalle($id)
    {
        $materia= App\Materia::findOrFail($id);
        return view('materias.detalle', compact('materia'));
    }
    
    public function formulariom()
    {
        $materias = App\Materia::all();
        return view('materia',compact('materias'));
    }
    public function crear(Request $request)
    {
        $request->validate([
            'materia_sigla'=>'required',
            'carrera'=>'required',
        ]);
        
        $materiaNueva = new App\Materia;
        $materiaNueva->materia_sigla=$request->materia_sigla;
        $materiaNueva->carrera=$request->carrera;

        $materiaNueva->save();

        return back()->with('mensaje','SE REGISTRO CORRECTAMENTE');
        
    }
    public function editar($id)
    {
        $materia=App\Materia::findOrFail($id);
        return view('materias.editar',compact('materia'));
    }
    public function update(Request $request, $id)
    {
        $materiaUpdate = App\Materia::findOrFail($id);
        $materiaUpdate->materia_sigla =$request->materia_sigla;
        $materiaUpdate->carrera=$request->carrera;

        $materiaUpdate->save();

        return back()->with('mensaje','SE ACTUALIZO CORRECTAMENTE');

    }
    public function eliminar($id)
    {
        $materiaEliminar = App\Materia::findOrFail($id);
        $materiaEliminar->delete();

        return back()->with('mensaje','SE ELIMINO CORRECTAMENTE');
    }
}
