@extends('layout.formlayout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>

<body>
<br><br>
<!-- Agregar modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar actividad de extensión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('AtcExtensionController@store')}}" method="POST">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Titulo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="title" class="form-control" name="titulo" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el titulo de la actividad"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Seleccione la actividad a registrar</label>
                        <select name="tipo_extension" id="tipo_extension" class="form-control">
                            <option value="1">Charla</option>
                            <option value="2">Curso</option>
                            <option value="3">Talleres</option>
                            <option value="4">Seminario</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputdate">Fecha en que se realizó</label>
                        <input type="date" class="form-control"  name="fecha">
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Expositor</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="expositor" pattern="[A-Za-z]+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del expositor"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Lugar</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ubicacion"  placeholder="Ingrese el lugar de la actividad"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Asistentes</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" name="cantidad_asistentes" placeholder="Ingrese la cantidad"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Organizador de la actividad</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="organizador" pattern="[A-Za-z]+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del organizador"/>
                            </div>
                        </div>
                    </div>

                    <!--Subir pdf-->
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">Subir lista de asistencia</label>
                                <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse… <input type="file" accept="image/png, image/jpeg, image/gif" id="imgInp">
                                    </span>
                                </span>
                                    <input id='urlname'type="text" class="form-control" readonly>
                                </div>
                                <button id="clear" class="btn btn-default">Clear</button>
                                <img id='img-upload'/>
                            </div>
                        </div>
                    </div>
                    <!--FIN Subir pdf-->


                    <!--cargar cositos-->
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Adjuntar imagenes</label>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Subir archivos</strong> <small> </small></div>
                                <div class="panel-body">
                                    <div class="input-group image-preview">
                                        <input placeholder="" type="text" class="form-control image-preview-filename" disabled="disabled">
                                        <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
						<!-- image-preview-clear button -->
						<button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
                                            <!-- image-preview-input -->
						<div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/>
                            <!-- rename it -->
						</div>
						<button type="button" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
						</span> </div>
                                    <!-- /input-group image-preview [TO HERE]-->

                                    <br />

                                    <!-- Drop Zone -->
                                    <div class="upload-drop-zone" id="drop-zone"> Or drag and drop files here </div>
                                    <br />
                                    <!-- Progress Bar -->
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                                    </div>
                                    <br />

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- termina formulario agregar -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Actualizar actividad de extensión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/act_regitro_extension" method="POST" id="editForm">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Titulo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="title" class="form-control" name="titulo" id="titulo" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el titulo de la actividad"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Seleccione la actividad a registrar</label>
                        <select name="tipo_extension" id="tipo_extension" class="form-control">
                            <option value="1">Charla</option>
                            <option value="2">Curso</option>
                            <option value="3">Talleres</option>
                            <option value="4">Seminario</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputdate">Fecha en que se realizó</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Expositor</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="expositor" id="expositor" pattern="[A-Za-z]+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del expositor"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Lugar</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ubicacion" id="ubicacion"  placeholder="Ingrese el lugar de la actividad"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Asistentes</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="number" class="form-control" name="cantidad_asistentes" id="cantidad_asistentes"  placeholder="Ingrese la cantidad"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Organizador de la actividad</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="organizador" id="organizador" pattern="[A-Za-z]+" title="Ingrese nombre válido"  placeholder="Ingrese el nombre del organizador"/>
                            </div>
                        </div>
                    </div>

                    <!--Subir pdf-->
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">Subir lista de asistencia</label>
                                <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse… <input type="file" accept="image/png, image/jpeg, image/gif" id="imgInp">
                                    </span>
                                </span>
                                    <input id='urlname'type="text" class="form-control" readonly>
                                </div>
                                <button id="clear" class="btn btn-default">Clear</button>
                                <img id='img-upload'/>
                            </div>
                        </div>
                    </div>
                    <!--FIN Subir pdf-->


                    <!--cargar cositos-->
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Adjuntar imagenes</label>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Subir archivos</strong> <small> </small></div>
                                <div class="panel-body">
                                    <div class="input-group image-preview">
                                        <input placeholder="" type="text" class="form-control image-preview-filename" disabled="disabled">
                                        <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
						<!-- image-preview-clear button -->
						<button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
                                            <!-- image-preview-input -->
						<div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/>
                            <!-- rename it -->
						</div>
						<button type="button" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
						</span> </div>
                                    <!-- /input-group image-preview [TO HERE]-->

                                    <br />

                                    <!-- Drop Zone -->
                                    <div class="upload-drop-zone" id="drop-zone"> Or drag and drop files here </div>
                                    <br />
                                    <!-- Progress Bar -->
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                                    </div>
                                    <br />

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- termina formulario agregar -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar datos</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/act_regitro_extension" method="POST" id="deleteForm">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <input type="hidden" name="_method" value="DELETE">
                    <p>¿Está seguro de que desea eliminar los datos?</p>
                </div>
                <!-- termina formulario agregar -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar datos</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Fin ELIMINAR modal -->

    <div class="container">

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


        <table id="datatable" class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITULO</th>
                <th scope="col">EXPOSITOR</th>
                <th scope="col">FECHA</th>
                <th scope="col">UBICACION</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">ORGANIZADOR</th>
                <th scope="col">TIPO</th>
                <th scope="col">ACCION</th>
            </tr>
            </thead>
            <tbody>
                @foreach($extensiones as $tdata)
                    <tr>
                        <th>{{$tdata->id}}</th>
                        <th>{{$tdata->titulo}}</th>
                        <td>{{$tdata->expositor}}</td>
                        <td>{{$tdata->fecha}}</td>
                        <td>{{$tdata->ubicacion}}</td>
                        <td>{{$tdata->cantidad_asistentes}}</td>
                        <th>{{$tdata->organizador}}</th>
                        <td>{{$tdata->tipo_extension}}</td>
                        <td>
                            <a href="#" class="btn btn-success edit">ACTUALIZAR</a>
                            <a href="#" class="btn btn-danger delete">ELIMINAR</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

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

            $('#nombre').val(data[1]);
            $('#rut').val(data[2]);
            $('#telefono').val(data[3]);
            $('#correo').val(data[4]);
            $('#empresa').val(data[5]);
            $('#lugar_trabajo').val(data[6]);
            $('#anio_titulacion').val(data[7]);
            $('#carrera').val(data[8]);

            $('#editForm').attr('action','/act_regitro_extension/'+data[0]);
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
            $('#deleteForm').attr('action','/act_regitro_extension/'+data[0]);
            $('#deleteModal').modal('show');
        });
        //END delte
    });
</script>
</body>
</html>
@endsection

