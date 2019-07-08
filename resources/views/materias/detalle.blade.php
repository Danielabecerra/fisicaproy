@extends('plantilla')

@section('seccion')
    <h1 class="display-4">Detalle de Materias</h1>
    <h4>id:{{$materia->id}}</h4>
    <h4>Materia_sigla:{{$materia->materia_sigla}}</h4>
    <h4>Carrera:{{$materia->carrera}}</h4>
@endsection