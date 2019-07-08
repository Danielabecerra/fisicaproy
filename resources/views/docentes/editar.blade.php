@extends('plantilla')
@section('seccion')
    <h1>Editar Docente {{$docente->id}}</h1>

    @if(session('mensaje'))

    <div class="alert alert-success">{{session('mensaje')}}</div>

    @endif

    <form action="{{route('docentes.update',$docente->id)}}" method="POST" role="form">
    @method('PUT')
    @csrf
    
    @error('nombre')
        <div class="alert alert-danger">
          EL NOMBRE ES OBLIGADO
        </div>
      @enderror
      @error('apellido_p')
        <div class="alert alert-danger">
          EL APELLIDO PATERNO ES OBLIGADO
        </div>
      @enderror
      @error('apellido_m')
        <div class="alert alert-danger">
          EL APELLIDO MATERNO ES OBLIGADO
        </div>
      @enderror
      @error('ci')
        <div class="alert alert-danger">
          EL CI ES OBLIGADO
        </div>
      @enderror
      @error('fecha_nac')
        <div class="alert alert-danger">
          LA FECHA DE NACIMIENTO ES OBLIGADO
        </div>
      @enderror
      @error('correo')
        <div class="alert alert-danger">
          EL CORREO ES OBLIGADO
        </div>
      @enderror
      @error('telefono')
        <div class="alert alert-danger">
          EL TELEFONO ES OBLIGADO
        </div>
      @enderror
      @error('profesion')
        <div class="alert alert-danger">
          LA PROFESION ES OBLIGADO
        </div>
      @enderror
      @error('carrera')
        <div class="alert alert-danger">
          LA CARRERA ES OBLIGADO
        </div>
      @enderror
      @error('estado')
        <div class="alert alert-danger">
          EL ESTADO ES OBLIGADO
        </div>
      @enderror
      <div class="form-group">
          <label for="">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="" placeholder="Escriba su nombre"  value="{{$docente->nombre}}">
      </div>
      <div class="form-group">
          <label for="">Apellido Paterno</label>
          <input type="text" class="form-control" name="apellido_p" id="" placeholder="Escriba su primer apellido"  value="{{$docente->apellido_p}}">
      </div>
      <div class="form-group">
          <label for="">Apellido Materno</label>
          <input type="text" class="form-control" name="apellido_m" id="" placeholder="Escriba su segundo apellido"  value="{{$docente->apellido_m}}">
      </div>
      <div class="form-group">
          <label for="">Carnet de Identidad</label>
          <input type="number" class="form-control" name="ci" id="" placeholder="Escriba su numero de carnet" value="{{$docente->ci}}">
      </div>
      <div class="form-group">
          <label for="">Fecha de Nacimiento</label>
          <input type="date" class="form-control" name="fecha_nac" id="" placeholder="Escriba su fecha de nacimiento"  value="{{$docente->fecha_nac}}">
      </div>
      <div class="form-group">
          <label for="">Correo</label>
          <input type="text" class="form-control" name="correo" id="" placeholder="Escriba su numero de correo" value="{{$docente->correo}}">
      </div>
      <div class="form-group">
          <label for="">Telefono</label>
          <input type="number" class="form-control" name="telefono" id="" placeholder="Escriba su numero de carnet" value="{{$docente->telefono}}">
      </div>
      <div class="form-group">
          <label for="">Profesion</label>
          <input type="text" class="form-control" name="profesion" id="" placeholder="Escriba su profesion"  value="{{$docente->profesion}}">
      </div>
      <div class="form-group">
          <label for="">Carrera</label>
          <input type="text" class="form-control" name="carrera" id="" placeholder="Escriba su carrera"  value="{{$docente->carrera}}">
      </div>
      <div class="form-group">
          <label for="">Estado</label>
          <input type="text" class="form-control" name="estado" id="" placeholder="Escriba su estado"  value="{{$docente->estado}}">
      </div>
      <div class="col-xs-4">
          <button type="submit" class="btn btn-warning btn-bloc">Editar</button>
      </div>
    </form>
@endsection