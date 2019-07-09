@extends('plantilla')

@section('seccion')
    <h1 class="display-4">Detalle de Horario</h1>
    <h4>id:{{$horario->id}}</h4>
    <h4>Dia:{{$horario->dia}}</h4>
    <h4>Hora_desde:{{$horario->hora_desde}}</h4>
    <h4>Hora_hasta:{{$horario->hora_hasta}}</h4>
@endsection