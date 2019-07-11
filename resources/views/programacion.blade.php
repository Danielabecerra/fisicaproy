@extends('plantilla')
@section('seccion')
  <section class="content-header">
    <h1>
      PROGRAMACION DE HORARIOS
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container">
      <section class="col-lg-10 connectedSortable">
        <div calss= "container">
          <div class="box box-primary">
            <div class="wrap">

              @if (session('mensaje'))
                <div class="alert alert-success" >
                  {{ session('mensaje')}}
                </div>
              @endif

              <form action="{{ route('crear') }}" method="POST" class="formulario">
                <div  class = " radio ">           
                  <table class="table table-hover table-condensed table-bordered">
                    <tr>
                      <td><h3 class="box-title">HORA</h3></td>
                      <td><h2 class="box-title">Lunes</h2></td>
                      <td><h2 class="box-title">Martes</h2></td>
                      <td><h2 class="box-title">Miercoles</h2></td>
                      <td><h2 class="box-title">Jueves</h2></td>
                      <td><h2 class="box-title">Viernes</h2></td>
                      <td><h2 class="box-title">Sabado</h2></td>
                      <td><h2 class="box-title">Domingo</h2></td>
                    </tr>
                    
                    <tr>
                      <td>
                        <h6 class="box-title">07:45 - 10:00</h6>
                      </td>
                      <br>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                      
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                          <option value="">--escoja la materia</option>

                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_d" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>

                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_h" value="1" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
                
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                        
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable1">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle1">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    
                                      @if ($errors->has('id_m'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_d'))
                                        <div class="alert alert-danger">
                                          El nombre del docente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_d" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_h" value="5" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable2">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle2" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle2">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_m'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_d'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_d" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="9" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>
                                      
                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>                                        
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                          
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable3">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable3" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle3" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle3">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    
                                      @if ($errors->has('id_m'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_d'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_d" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_h" value="13" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable4">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable4" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle4" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle4">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="17" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable5">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable5" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle5" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle5">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="21" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                        
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                          
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable6">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable6" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle6" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle6">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="25" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                                
                                        </select>
                                      </div>
            
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                        
                    <tr >
                      <td><h6 class="box-title">10:00 - 12:15</h6></td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable7">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable7" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle7" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle7">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="2" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>  
                         
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable8">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable8" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle8" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle8">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="6" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                                
                                        </select>
                                      </div>
            
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable9">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable9" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle9" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle9">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="10" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable10">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable10" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle10" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle10">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="14" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable11">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable11" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle11" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle11">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="18" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                            
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable12">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable12" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle12" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle12">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="22" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                                
                                        </select>
                                      </div>
            
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable13">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable13" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle13" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle13">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="26" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                            
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><h6 class="box-title">12:15 - 14:00</h6></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><h6 class="box-title">14:00 - 16:15</h6></td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable14">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable14" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle14" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle14">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                  
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="3" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                                
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable15">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable15" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle15" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle15">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="7" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                          
                                        </select>
                                      </div>
            
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable16">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable16" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle16" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle16">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()    
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="11" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                            
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable17">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable17" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle17" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle17">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="15" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                                
                                        </select>
                                      </div>
            
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable18">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable18" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle18" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle18">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="19" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                          
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>
                                        <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable19">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable19" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle19" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle19">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="23" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                          
                                        </select>
                                      </div>
            
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable20">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable20" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle20" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle20">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="27" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                                
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><h6 class="box-title">16:15 - 18:30</h6></td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable21">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable21" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle21" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle21">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="4" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                        
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable22">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable22" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle22" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle22">Programar una materia</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="8" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                              
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable23">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable23" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle23" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle23">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="12" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                              
                                        </select>
                                      </div>
            
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable24">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable24" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle24" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle24">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="16" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                              
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable25">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable25" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle25" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle25">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()   
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="20" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable26">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable26" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle26" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle26">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()    
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="24" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>                                           
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable27">
                          Programar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable27" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle27" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle27">Programar una materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <tbody>
                                    <form action="{{ route('crear') }}" method="POST" >
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  
                                      @if ($errors->has('id_materia'))
                                        <div class="alert alert-danger">
                                          El nombre de la materia es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('id_docente'))
                                        <div class="alert alert-danger">
                                          El nombre del docebte es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('grupo'))
                                        <div class="alert alert-danger">
                                          El grupo es obligatorio
                                        </div>
                                      @endif
                                    
                                      @if ($errors->has('ambiente'))
                                        <div class="alert alert-danger">
                                          El ambiente es obligatorio
                                        </div>
                                      @endif

                                      @if ($errors->has('gestion'))
                                        <div class="alert alert-danger">
                                          La gestion es obligatoria
                                        </div>
                                      @endif

                                      @if ($errors->has('cupo_max'))
                                        <div class="alert alert-danger">
                                          El cupo maximo de alumnos es obligatorio
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
                                        <select name="id_materia" class="form-control" id="inputMateria_id">
                                          <option value="">--escoja la materia</option>
                                          @foreach($materias as $item)
                                            <option value="{{$item->id}}">{{$item->nomb_materia}}</option>   
                                          @endforeach()  
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Nombre del docente</label>
                                        <select name="id_docente" class="form-control" id="inputDocente_id">
                                          <option value="">--escoja al docente--</option>
                                          @foreach($docentes as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido_p}} {{$item->apellido_m}}</option>
                                          @endforeach()    
                                        </select>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="id_horario" value="28" >
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect3">Grupo</label>
                                        <select class="form-control" id="exampleFormControlSelect3" name="grupo" value="{{ old('grupo')}}">
                                          <option value="">--escoja un grupo--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                        </select>
                                      </div>
              
                                      <div class="form-group has-feedback">
                                        <label>Ambiente</label>
                                        <input type="text" class="form-control" name="ambiente" placeholder="ambiente de la materia" class="form-control mb2" value="{{ old('ambiente')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>Gestion</label>
                                        <input type="text" class="form-control" name="gestion" placeholder="gestion" class="form-control mb2" value="{{ old('gestion')}}" >
                                      </div>

                                      <div class="form-group has-feedback">
                                        <label>cupo max</label>
                                        <input type="text" class="form-control" name="cupo_max" placeholder="Sigla de materia" class="form-control mb2" value="{{ old('cupo_max')}}" >
                                      </div>
                                        
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                      
                                    </form>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </form>             
            </div>
            <div calss= "container my-4">
              <div class="box box-primary">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#id</th>
                      <th scope="col">Materia</th>
                      <th scope="col">Docente</th>
                      <th scope="col">Hora de inicio</th>
                      <th scope="col">Hora de fonalizacion</th>
                      <th scope="col">Grupo</th>
                      <th scope="col">Ambiente</th>
                      <th scope="col">gestion</th>
                      <th scope="col">Cupo Maximo</th>
                        
                      <th scope="col">Editar progra</th>
                      <th scope="col">Eliminar progra</th>
                    </tr>
                  </thead>
                        
                  <tbody>
                    @foreach($progamacionmathors as $item)
                      <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->materia->nomb_materia}}</td>
                        <td>{{$item->docente->nombre}} {{$item->docente->apellido_p}} {{$item->docente->apellido_m}}</td>
                        <td>{{$item->horario->hora_desde}}</td>
                        <td>{{$item->horario->hora_hasta}}</td>
                        <td>{{$item->grupo}}</td>
                        <td>{{$item->ambiente}}</td>
                        <td>{{$item->gestion}}</td>
                        <td>{{$item->cupo_max}}</td>
                                
                        <td>
                          <a href="{{ route('editarp', $item) }}" class="btn btn-warning" btn-sm>
                            <span class="glyphicon glyphicon-pencil">
                          </a>
                        </td>
                                            
                        <td>
                          <form action="{{route('eliminarh', $item)}}" method="POST" class="d-inline">
                            {{method_field('DELETE')}}
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <button class="btn btn-danger btn-sm" type="submit">
                              <span class="glyphicon glyphicon-remove">
                            </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
@endsection