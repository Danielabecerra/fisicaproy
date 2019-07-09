<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class DocenteController extends Controller {

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


	//presenta el formulario para nuevo usuario
	public function detalle($id)
	{
		$docente = App\Docente::findOrFail($id);
		return view('docentes.detalle', compact('docente'));
	}    

	public function formulariod()
	{
		$docentes = App\Docente::paginate(1);
		return view('docente',compact('docentes'));
	}
	public function crear(Request $request)
	{
		//verifica que las respuestas s estan enviando
		//return $request->all();
		$request->validate([
		'nombre'=>'required',
		'apellido_p'=>'required',
		'apellido_m'=>'required',
		'ci'=>'required',
		'fecha_nac'=>'required',
		'correo'=>'required',
		'telefono'=>'required',
		'profesion'=>'required',
		'carrera'=>'required',
		'estado'=>'required',
		]);
		
		$docenteNuevo = new App\Docente;
		$docenteNuevo->nombre =$request->nombre;
		$docenteNuevo->apellido_p =$request->apellido_p;
		$docenteNuevo->apellido_m =$request->apellido_m;
		$docenteNuevo->ci =$request->ci;
		$docenteNuevo->fecha_nac =$request->fecha_nac;
		$docenteNuevo->correo =$request->correo;
		$docenteNuevo->telefono =$request->telefono;
		$docenteNuevo->profesion =$request->profesion;
		$docenteNuevo->carrera =$request->carrera;
		$docenteNuevo->estado =$request->estado;

		$docenteNuevo->save();

		return back()->with('mensaje','SE REGISTRO CORRECTAMENTE');
	}
	public function editar($id){
		$docente = App\Docente::findOrFail($id);
		return view('docentes.editar', compact('docente'));
	}
	public function update(Request $request, $id)
	{
		$docenteUpdate = App\Docente::findOrFail($id);
		$docenteUpdate->nombre =$request->nombre;
		$docenteUpdate->apellido_p =$request->apellido_p;
		$docenteUpdate->apellido_m =$request->apellido_m;
		$docenteUpdate->ci =$request->ci;
		$docenteUpdate->fecha_nac =$request->fecha_nac;
		$docenteUpdate->correo =$request->correo;
		$docenteUpdate->telefono =$request->telefono;
		$docenteUpdate->profesion =$request->profesion;
		$docenteUpdate->carrera =$request->carrera;
		$docenteUpdate->estado =$request->estado;

		$docenteUpdate->save();

		return back()->with('mensaje','DOCENTE ACTUALIZADO');

	}
	public function eliminar($id)
    {
        $materiaEliminar = App\Docente::findOrFail($id);
        $materiaEliminar->delete();

        return back()->with('mensaje','SE ELIMINO CORRECTAMENTE');
    }

}