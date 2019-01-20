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
                <h5 class="modal-title" id="exampleModalLabel">Registrar Aprendizaje </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('AtcAprendizajeMasServController@store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="asignatura" class="cols-sm-2 control-label">Seleccionar asignatura</label>
                        <select name="asignaturaid"  class="form-control">
                            <option value="1">Programación</option>
                            <option value="2">Lenguaje de programación</option>
                            <option value="3">Base de datos</option>
                            <option value="4">Ing software</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="profesor" class="cols-sm-2 control-label">Nombre profesor</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="nombre_profesor" pattern="[A-Za-z]+" title="Ingrese nombre válido"  placeholder="Ingrese profesor"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cestudiantes" class="cols-sm-2 control-label">Cantidad estudiantes</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="number" class="form-control" name="cantidad_estudiantes"   placeholder="Ingrese cantidad de estudiantes"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sociocomunitario" class="cols-sm-2 control-label">Nombre socio comunitario</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="nombre_socio" pattern="[A-Za-z]+" title="Ingrese nombre válido"  placeholder="Ingrese nombre socio comunitario"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="semestreaño" class="cols-sm-2 control-label">Seleccionar un Periodo</label>
                        <select name="semestreaño"  class="form-control">
                            <OPTION VALUE="2018-2" SELECTED>Segundo semestre año 2018</OPTION>
                            <OPTION VALUE="2018-1">Primer semestre año 2018</OPTION>
                            <OPTION VALUE="2017-2">Segundo semestre año 2017</OPTION>
                            <OPTION VALUE="2017-1">Primer semestre año 2017</OPTION>
                            <OPTION VALUE="2016-2">Segundo semestre año 2016</OPTION>
                            <OPTION VALUE="2016-1">Primer semestre año 2016</OPTION>
                            <OPTION VALUE="2015-2">Segundo semestre año 2015</OPTION>
                            <OPTION VALUE="2015-1">Primer semestre año 2015</OPTION>
                            <OPTION VALUE="2014-2">Segundo semestre año 2014</OPTION>
                            <OPTION VALUE="2014-1">Primer semestre año 2014</OPTION>
                        </SELECT>

                    </div>

                    <div class="form-group">
                        <label for="evidencia" class="cols-sm-2 control-label">Evidencia</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="file" class="form-control" name="evidencia" id="evidencia" >
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
                <h5 class="modal-title" id="exampleModalLabel">Registrar aprendizaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/act_aprendizaje_servicio" method="POST" id="editForm" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">


                    <div class="form-group">
                        <label for="asignatura" class="cols-sm-2 control-label">Seleccionar asignatura</label>
                        <select name="asignaturaid" id="asignaturaid" class="form-control">
                            <option value="1">Programación</option>
                            <option value="2">Lenguaje de programación</option>
                            <option value="3">Base de datos</option>
                            <option value="4">Ing software</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="profesor" class="cols-sm-2 control-label">Nombre profesor</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="nombre_profesor" id="nombre_profesor" pattern="[A-Za-z]+" title="Ingrese nombre válido" placeholder="Ingrese profesor"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cestudiantes" class="cols-sm-2 control-label">Cantidad estudiantes</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="number" class="form-control" name="cantidad_estudiantes" id="cantidad_estudiantes"  placeholder="Ingrese cantidad de estudiantes"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sociocomunitario" class="cols-sm-2 control-label">Nombre socio comunitario</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="nombre_socio" id="nombre_socio" pattern="[A-Za-z]+" title="Ingrese nombre válido"  placeholder="Ingrese nombre socio comunitario"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="semestreaño" class="cols-sm-2 control-label">Seleccionar un Periodo</label>
                        <select name="semestreaño" id="semestreaño" class="form-control">
                            <OPTION VALUE="2018-2" SELECTED>Segundo semestre año 2018</OPTION>
                            <OPTION VALUE="2018-1">Primer semestre año 2018</OPTION>
                            <OPTION VALUE="2017-2">Segundo semestre año 2017</OPTION>
                            <OPTION VALUE="2017-1">Primer semestre año 2017</OPTION>
                            <OPTION VALUE="2016-2">Segundo semestre año 2016</OPTION>
                            <OPTION VALUE="2016-1">Primer semestre año 2016</OPTION>
                            <OPTION VALUE="2015-2">Segundo semestre año 2015</OPTION>
                            <OPTION VALUE="2015-1">Primer semestre año 2015</OPTION>
                            <OPTION VALUE="2014-2">Segundo semestre año 2014</OPTION>
                            <OPTION VALUE="2014-1">Primer semestre año 2014</OPTION>
                        </SELECT>

                    </div>

                    <div class="form-group">
                        <label for="evidencia" class="cols-sm-2 control-label">Evidencia</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="file" class="form-control" name="evidencia" id="evidencia" >
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
                <h5 class="modal-title" id="exampleModalLabel">Registrar aprendizaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/act_aprendizaje_servicio" method="POST" id="deleteForm">
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
                <th scope="col">NOMBRE</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">SOCIO</th>
                <th scope="col">SEMESTRE AÑO</th>
                <th scope="col">ASIGNATURA</th>
                <th scope="col">ACCION</th>

            </tr>
            </thead>
            <tbody>
                @foreach($aprendizajes as $tdata)
                    <tr>
                        <th>{{$tdata->id}}</th>
                        <th>{{$tdata->nombre_profesor}}</th>
                        <td>{{$tdata->cantidad_estudiantes}}</td>
                        <td>{{$tdata->nombre_socio}}</td>
                        <td>{{$tdata->semestreaño}}</td>
                        <td>{{$tdata->asignaturaid}}</td>
                        <td>
                            <a href="#" class="btn btn-success edit">ACTUALIZAR</a>
                            <a href="#" class="btn btn-danger delete">ELIMINAR</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>





{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>--}}

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

            $('#nombre_profesor').val(data[1]);
            $('#cantidad_estudiantes').val(data[2]);
            $('#nombre_socio').val(data[3]);
            $('#semestreaño').val(data[4]);
            $('#asignaturaid').val(data[5]);

            $('#editForm').attr('action','/act_aprendizaje_servicio/'+data[0]);
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
            $('#deleteForm').attr('action','/act_aprendizaje_servicio/'+data[0]);
            $('#deleteModal').modal('show');
        });
        //END delete
    });
</script>

</body>
</html>

@endsection
