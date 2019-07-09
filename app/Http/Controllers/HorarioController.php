<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HorarioController extends Controller{
    
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

    //detalle
    public function detalle($id)
    {
        $materia= App\Horario::findOrFail($id);
        return view('horarios.detalle', compact('horario'));
    }
    

    //principal

    public function formularioh()
    {
        $materias = App\Horario::all();
        return view('horario',compact('horarios'));
    }


    // crear un horario
    public function crear(Request $request)
    {
        $request->validate([
            'dia'=>'required',
            'hora_desde'=>'required',
            'hora_hasta'=>'required',
        ]);
        
        $horarioNuevo = new App\Horario;
        $horarioNuevo->dia=$request->dia;
        $horarioNuevo->hora_desde=$request->hora_desde;
        $horarioNuevo->hora_hasta=$request->hora_hasta;

        $horarioNuevo->save();

        return back()->with('mensaje','SE REGISTRO CORRECTAMENTE');
        
    }

    //editar horario
    public function editar($id)
    {
        $horario=App\Horario::findOrFail($id);
        return view('horarios.editar',compact('horario'));
    }

    //actualizar horario
    public function update(Request $request, $id)
    {
        $horarioUpdate = App\Horario::findOrFail($id);
        $horarioUpdate->dia =$request->dia;
        $horarioUpdate->hora_desde=$request->hora_desde;
        $horarioUpdate->hora_hasta=$request->hora_hasta;

        $horarioUpdate->save();

        return back()->with('mensaje','SE ACTUALIZO CORRECTAMENTE');

    }
    //eliminar
    public function eliminar($id)
    {
        $horarioEliminar = App\Horario::findOrFail($id);
        $horarioEliminar->delete();

        return back()->with('mensaje','SE ELIMINO CORRECTAMENTE');
    }
}
