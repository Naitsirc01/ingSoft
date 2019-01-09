
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
                <h5 class="modal-title" id="exampleModalLabel">Registrar actividad de titulación por convenio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('TitulacionsController@store')}}" method="POST">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label for="name" class="cols-sm-2 control-label">Titulo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="titulo"  placeholder="Ingrese el titulo de la actividad"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="nombre"  placeholder="Ingrese el nombre del estudiante"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">Rut</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="rut" placeholder="Ingrese el rut del estudiante"/>
                            </div>
                        </div>

                        <label for="name" class="cols-sm-2 control-label">Seleccione la Carrera</label>
                        <select class="form-control" name="carrera"  placeholder="Registrar cositos">
                            <option>ICCI</option>
                            <option>ICI</option>
                            <option>ICA</option>
                            <option>ICdM</option>
                            <option>ICM</option>
                            <option>ICPC</option>
                            <option>ICQ</option>
                            <option>IC</option>
                        </select>

                        <label for="exampleInputdate">Fecha de inicio</label>
                        <input type="date" class="form-control"  name="fecha_inicio">

                        <label for="exampleInputdate">Fecha de termino</label>
                        <input type="date" class="form-control"  name="fecha_termino">

                        <label for="email" class="cols-sm-2 control-label">Nombre profesor guia</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="profesor" placeholder="Ingrese el nombre del profesor"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">Nombre empresa</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="empresa"  placeholder="Ingrese el nombre de la empresa donde se realiza"/>
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
                <h5 class="modal-title" id="exampleModalLabel">Actualizar actividad de titulación por convenio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/titulacion" method="POST" id="editForm">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label for="name" class="cols-sm-2 control-label">Titulo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="titulo" id="titulo"  placeholder="Ingrese el titulo de la actividad"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el nombre del estudiante"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">Rut</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="rut" id="rut"  placeholder="Ingrese el rut del estudiante"/>
                            </div>
                        </div>

                        <label for="name" class="cols-sm-2 control-label">Seleccione la Carrera</label>
                        <select class="form-control" name="carrera" id="carrera" placeholder="Registrar cositos">
                            <option>ICCI</option>
                            <option>ICI</option>
                            <option>ICA</option>
                            <option>ICdM</option>
                            <option>ICM</option>
                            <option>ICPC</option>
                            <option>ICQ</option>
                            <option>IC</option>
                        </select>

                        <label for="exampleInputdate">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">

                        <label for="exampleInputdate">Fecha de termino</label>
                        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino">

                        <label for="email" class="cols-sm-2 control-label">Nombre profesor guia</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="profesor" id="profesor"  placeholder="Ingrese el nombre del profesor"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">Nombre empresa</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="empresa" id="empresa"  placeholder="Ingrese el nombre de la empresa donde se realiza"/>
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
            <form action="/titulacion" method="POST" id="deleteForm">
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
                <th scope="col">NOMBRE</th>
                <th scope="col">RUT</th>
                <th scope="col">CARRERA</th>
                <th scope="col">FECHA INICIO</th>
                <th scope="col">FECHA TERMINO</th>
                <th scope="col">PROFESOR</th>
                <th scope="col">EMPRESA</th>
                <th scope="col">ACCION</th>
            </tr>
            </thead>
            <tbody>
                @foreach($titulacions as $tdata)
                    <tr>
                        <th>{{$tdata->id}}</th>
                        <th>{{$tdata->titulo}}</th>
                        <th>{{$tdata->nombre}}</th>
                        <td>{{$tdata->rut}}</td>
                        <td>{{$tdata->carrera}}</td>
                        <td>{{$tdata->fecha_inicio}}</td>
                        <td>{{$tdata->fecha_termino}}</td>
                        <td>{{$tdata->profesor}}</td>
                        <td>{{$tdata->empresa}}</td>
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
            $('#titulo').val(data[1]);
            $('#nombre').val(data[2]);
            $('#rut').val(data[3]);
            $('#carrera').val(data[4]);
            $('#fecha_inicio').val(data[5]);
            $('#fecha_termino').val(data[6]);
            $('#profesor').val(data[7]);
            $('#empresa').val(data[8]);

            $('#editForm').attr('action','/titulacion/'+data[0]);
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
            $('#deleteForm').attr('action','/titulacion/'+data[0]);
            $('#deleteModal').modal('show');
        });
        //END delete
    });
</script>
</body>
</html>

