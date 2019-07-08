@extends('plantilla')
@section('seccion')
    <h1>Editar Materia {{$materia->id}}</h1>

    @if(session('mensaje'))

    <div class="alert alert-success">{{session('mensaje')}}</div>

    @endif

    <form action="{{route('materias.update',$materia->id)}}" method="POST" role="form">
    @method('PUT')
    @csrf
    @error('materia_sigla')
        <div class="alert alert-danger">
          LA MATERIA Y SIGLA SON OBLIGADO
        </div>
    @enderror
    @error('carrera')
        <div class="alert alert-danger">
          LA CARRERA ES OBLIGADA
        </div>
    @enderror
    <div class="form-group">
      <label for="">Materia_Sigla</label>
      <input type="text" class="form-control" name="materia_sigla" id="" placeholder="Escribir la materia mas su sigla" value="{{$materia->materia_sigla}}">
    </div>
    <div class="form-group">
      <label for="">Carrera</label>
      <input type="text" class="form-control" name="carrera" id="" placeholder="Escribir la carrera" value="{{$materia->carrera}}">
    </div>
    <div class="col-xs-4">
    <button type="submit" class="btn btn-warning btn-bloc">Editar</button>
    </div>
  </form>
@endsection