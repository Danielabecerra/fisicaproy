@extends('plantilla')
@section('seccion')
    <h1>Editar Horario {{$Horario->id}}</h1>

    @if(session('mensaje'))

    <div class="alert alert-success">{{session('mensaje')}}</div>

    @endif
    <form action="{{route('horarios.update',$horario->id)}}" method="POST" role="form">
    @method('PUT')
    @csrf
    
    @error('dia')
        <div class="alert alert-danger">
          EL DIA ES OBLIGATORIO
        </div>
    @enderror
    @error('Hora_desde')
        <div class="alert alert-danger">
          LA HORA ES OBLIGADA
        </div>
    @enderror
    @error('Hora_hasta')
        <div class="alert alert-danger">
          LA HORA ES OBLIGADA
        </div>
    @enderror
    <div class="form-group">
      <label for="">Dia</label>
      <input type="text" class="form-control" name="dia" id="" placeholder="Escribir la materia mas su sigla" value="{{ $horario->dia}}">
    </div>
    <div class="form-group">
      <label for="">Hora_desde</label>
      <input type="text" class="form-control" name="hora_desde" id="" placeholder="Escribir la hora_desde" value="{{ $horario->hora_desde}}">
    </div>
    <div class="form-group">
      <label for="">Hora_hasta</label>
      <input type="text" class="form-control" name="hora_hasta" id="" placeholder="Escribir la hora_hasta" value="{{ $horario->hora_hasta}}">
    </div>
    <div class="col-xs-4">
    <button type="submit" class="btn btn-warning btn-block">Editar</button>
    </div>
  </form> 
@endsection