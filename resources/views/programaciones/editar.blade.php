@extends('plantilla')
@section('seccion')
  <!-- Main content -->
  <section class="content">
    <section class="col-lg-10 connectedSortable">
      <!-- TO DO List -->
        <h1>
            Editar programacion {{ $programarlabs->id }}
        </h1>
        @if (session('mensaje'))
            <div class="alert alert-siccess">
                {{ session('mensaje')}}
            </div>
        @endif 
        <form action="{{ route('update', $programarlabs->id) }}" method="POST">
            {{method_field('PUT')}}
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                
            @if ($errors->has('id_m'))
                <div class="alert alert-danger">
                    EL NOMBRE DE LA MATERIA ES OBLIGATORIO
                </div>
            @endif

            @if ($errors->has('id_d'))
                <div class="alert alert-danger">
                    EL NOMBRE DEL DOCENTE ES OBLIGATORIO
                </div>
            @endif

            @if ($errors->has('grupo'))
                <div class="alert alert-danger">
                    EL GRUPO ES OBLIGATORIO
                </div>
            @endif
                                      
            @if ($errors->has('ambiente'))
                <div class="alert alert-danger">
                    EL AMBIENTE ES OBLIGATORIO
                </div>
            @endif

            @if ($errors->has('gestion'))
                <div class="alert alert-danger">
                    LA GESTION ES OBLIGATORIA
                </div>
            @endif

            @if ($errors->has('cupo_max'))
                <div class="alert alert-danger">
                    EL CUPO MAXIMO DE ALUMNOS ES OBLIGATORIO
                </div>
            @endif

            <section class="content-header">
                <h1>
                    Añadir materia
                </h1>
            </section>
            <br>
            <div class="form-group">
                <label for="">Nombre de la materia</label>
                <select name="id_m" class="form-control" id="inputMateria_id">
                    <option value="{{ $progRamarlabs->id_m }}">--escoja la materia</option>
                    @foreach($materias as $item)
                        <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                    @endforeach()  
                </select>
            </div>
            <div class="form-group">
                <label for="">Nombre del docente</label>
                <select name="id_d" class="form-control" id="inputDocente_id">
                    <option value="{{ $programarlabs->id_d }}">--escoja al docente--</option>
                    @foreach($materias as $item)
                        <option value="{{$item->id}}">{{$item->nomb_materia}}</option>
                    @endforeach()  
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="hidden" name="id_h" value="1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect3">Grupo</label>
                <select class="form-control" 
                    id="exampleFormControlSelect3" 
                    name="grupo" value="{{ $programarlabs->grupo }}">
                    <option value="">--escoja un grupo--</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                                                
                </select>
            </div>
                
            <div class="form-group has-feedback">
                <label>Ambiente</label>
                <input type="text" 
                class="form-control" 
                name="ambiente" 
                placeholder="ambiente de la materia" 
                class="form-control mb2" 
                value="{{ $programarlabs->ambiente }}" >
            </div>

            <div class="form-group has-feedback">
                <label>Gestion</label>
                <input type="text" 
                class="form-control" 
                name="gestion" 
                class="form-control mb2"
                 value="{{ $programarlabs->gestion }}" >
            </div>

            <div class="form-group has-feedback">
                <label>cupo max</label>
                <input type="text" class="form-control" 
                    name="cupo_max"                    
                    class="form-control mb2" 
                    value="{{ $programarlabs->cupo_max }}">
            </div>
                                          
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">editar</button>
            </div>
                                        
        </form>
    </section>
  </section>
@endsection
