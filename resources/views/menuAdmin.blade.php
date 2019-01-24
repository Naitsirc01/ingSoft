@extends('layout.formlayout')
@section('content')
        <!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<style>
    .margentabla {
        margin: 2%;
    }
</style>

<body>
<br><br>
<!-- Agregar modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('UsuarioController@store')}}" method="POST" onsubmit="return confirm('¿Esta seguro que desea agregar este nuevo registro?');">
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                        <div class="col-md-6">
                            <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" required autofocus>

                            @if ($errors->has('rut'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="departamento_id" class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="departamento">
                                @foreach($departamentos as $d)
                                    <option value={{$d->id}}>{{$d->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="privilegio" class="col-md-4 col-form-label text-md-right">{{ __('Privilegio') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="privilegio">
                                <option value="user">user</option>
                                <option value="jefeDeCarrera">jefe de carrera</option>
                                <option value="academico">academico</option>
                                <option value="secretaria">secretaria</option>
                                <option value="encargado">encargado</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <!-- termina formulario agregar -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Fin agregar modal -->

<!-- ACUALIZAR modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos de los usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/menuAdmin" method="POST" id="editForm" onsubmit="return confirm('¿Esta seguro que desea confirmar los cambios?');">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="nameEd" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                        <div class="col-md-6">
                            <input id="rutEd" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" required autofocus>

                            @if ($errors->has('rut'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="departamento_id" class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>
                        <div class="col-md-6">
                            <select id="departamentoEd" class="form-control" name="departamento">
                                @foreach($departamentos as $d)
                                    <option value={{$d->id}}>{{$d->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailEd" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="privilegio" class="col-md-4 col-form-label text-md-right">{{ __('Privilegio') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" id="privilegioEd" name="privilegio">
                                <option value="6">user</option>
                                <option value="5">jefe de carrera</option>
                                <option value="4">academico</option>
                                <option value="3">secretaria</option>
                                <option value="2">encargado</option>
                                <option value="1">admin</option>
                            </select>
                        </div>
                    </div>

                </div>
                <!-- termina formulario agregar -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Fin ACTUALIZAR modal -->

<!-- ELIMINAR modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/menuAdmin" method="POST" id="deleteForm">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <input type="hidden" name="_method" value="DELETE">
                    <p>¿Está seguro de que desea eliminar los datos?</p>
                </div>
                <!-- termina formulario agregar -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancelar</button>
                    <button type="submit" class="btn btn-primary">Si, eliminar</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Fin ELIMINAR modal -->

<div class="margentabla">

    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
@endif

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Registrar
    </button>

    <br><br>


    <table id="datatable" class="table table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Rut</th>
            <th scope="col">Correo</th>
            <th scope="col">Departamento</th>
            <th scope="col">Privilegio</th>
            <th scope="col">Accion</th>

        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $tdata)
            <tr>
                <th>{{$tdata->id}}</th>
                <td>{{$tdata->nombre}}</td>
                <td>{{$tdata->rut}}</td>
                <td>{{$tdata->email}}</td>
                <td>{{$tdata->departamento->nombre}}</td>
                <td>{{$tdata->roles->first()->name}}</td>
                <td>
                    <a href="#" class="btn btn-default edit"><i class="fa fa-edit" style="font-size:24px"></i></a>
                    <a href="#" class="btn btn-default delete"><i class="fa fa-times" style="font-size:24px"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>





<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable').DataTable();
        //start edit
        table.on('click','.edit',function(){
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr=$tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);

            $('#nameEd').val(data[1]);
            $('#rutEd').val(data[2]);
            $('#emailEd').val(data[3]);
            $('#departamentoEd').val(findDepto(data[4]));
            $('#privilegioEd').val(findPrivId(data[5]));

            $('#editForm').attr('action','/menuAdmin/'+data[0]);
            $('#editModal').modal('show');
        });
        //END edit
        //start delete
        table.on('click','.delete',function(){
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr=$tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);

            $('#id').val(data[0]);
            $('#deleteForm').attr('action','/menuAdmin/'+data[0]);
            $('#deleteModal').modal('show');
        });
        //END delete
    });
</script>
<script>
    var dept={!!$departamentos!!};
    var priv={!! $privilegios !!};
    function findDepto($name) {
        var $i;
        for($i=0;$i<window.dept.length;$i++){
            if(dept[$i].nombre == $name){
                return dept[$i].id;
            }
        }
    }
    function findPrivId($name) {
        var $i;
        for($i=0;$i<window.priv.length;$i++){
            if(priv[$i].name == $name){
                return priv[$i].id;
            }
        }
    }
</script>
</body>
</html>

@endsection
