@extends('plantilla')
@section('seccion')
  <h1 class="display-4">Detalle de Docente:</h1>
  <h3>id:{{$docente->id}}</h3>
  <h3>Nombre:{{$docente->nombre}}</h3>
  <h3>Apellido Paterno:{{$docente->apellido_p}}</h3>
  <h3>Apellido Materno:{{$docente->apellido_m}}</h3>
  <h3>Ci:{{$docente->ci}}</h3>
  <h3>Fecha de Nacimiento:{{$docente->fecha_nac}}</h3>
  <h3>Correo:{{$docente->correo}}</h3>
  <h3>Telefono:{{$docente->telefono}}</h3>
  <h3>Profesion:{{$docente->profesion}}</h3>
  <h3>Carrera:{{$docente->carrera}}</h3>
  <h3>Estado:{{$docente->estado}}</h3>
@endsection