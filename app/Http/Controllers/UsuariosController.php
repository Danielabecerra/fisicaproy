<?php namespace App\Http\Controllers;

use App\horarios;
use Request;

class UsuariosController extends Controller {

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
	public function horario()
	{

		$data=Request::all();

		$usuario= new User;
		$usuario->Hora      =$data["hora"];
		$usuario->Lunes     =$data["lunes"];
		$usuario->Martes    =$data["martes"];
		$usuario->Miercoles =$data["miercoles"];
		$usuario->Jueves    =$data["jueves"];
		$usuario->Viernes   =$data["viernes"];

		$resul= $usuario->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");   
		}
		else
		{
             
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}


	}

}