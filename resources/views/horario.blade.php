@extends('plantilla')
@section('seccion')
  <!-- contenido principal -->
  <h1 class="display-4">Horarios</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Dia</th>
        <th scope="col">Hora_desde</th>
        <th scope="col">Hora_hasta</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($horarios as $item)
        <tr>
          <th scope="row">{{$item->id}}</th>
          <td>
            <a href="{{route('horarios.detalle', $item)}}">
              {{$item->dia}}
            </a>
          </td>
          <td>{{$item->hora_desde}}</td>
          <td>{{$item->hora_hasta}}</td>
          <td>
            <a href="{{route('horarios.editar',$item)}}" class = "btn btn-warning btn-sm">Editar</a>
          </td>
          <td>
            <form action="{{route('horarios.eliminar',$item)}}" method="POST" class="d-inline">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sn" type="submit">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach()
    </tbody>
  </table>
  @if (session('mensaje'))
  <div class="alert alert-success">
    {{session('mensaje')}}
  </div>
  @endif
  
  <form action="{{route('horarios.crear')}}" method="POST" role="form">
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
      <input type="text" class="form-control" name="dia" id="" placeholder="Escribir la materia mas su sigla" value="{{old('dia')}}">
    </div>
    <div class="form-group">
      <label for="">Hora_desde</label>
      <input type="text" class="form-control" name="hora_desde" id="" placeholder="Escribir la hora_desde" value="{{old('hora_desde')}}">
    </div>
    <div class="form-group">
      <label for="">Hora_hasta</label>
      <input type="text" class="form-control" name="hora_hasta" id="" placeholder="Escribir la hora_hasta" value="{{old('hora_hasta')}}">
    </div>
    <div class="col-xs-4">
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form> 
@endsection