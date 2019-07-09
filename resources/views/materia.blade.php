@extends('plantilla')
@section('seccion')
  <!-- contenido principal -->
  <h1 class="display-4">Materias</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Materia_Sigla</th>
        <th scope="col">Carrera</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($materias as $item)
        <tr>
          <th scope="row">{{$item->id}}</th>
          <td>
            <a href="{{route('materias.detalle', $item)}}">
              {{$item->materia_sigla}}
            </a>
          </td>
          <td>{{$item->carrera}}</td>
          <td>
            <a href="{{route('materias.editar',$item)}}" class = "btn btn-warning btn-sm">Editar</a>
          </td>
          <td>
            <form action="{{route('materias.eliminar',$item)}}" method="POST" class="d-inline">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn.sn" type="submit">Eliminar</button>
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
  <form action="{{route('materias.crear')}}" method="POST" role="form">
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
      <input type="text" class="form-control" name="materia_sigla" id="" placeholder="Escribir la materia mas su sigla" value="{{old('materia_sigla')}}">
    </div>
    <div class="form-group">
      <label for="">Carrera</label>
      <input type="text" class="form-control" name="carrera" id="" placeholder="Escribir la carrera" value="{{old('carrera')}}">
    </div>
    <div class="col-xs-4">
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form> 
@endsection