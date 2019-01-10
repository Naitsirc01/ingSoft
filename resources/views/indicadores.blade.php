@extends('layout.formlayout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<style>
    .column {
        float: left;
        width: 45%;
        padding: 10px;
        /*height: 300px; !* Should be removed. Only for demonstration *!*/
    }
    .columnOp {
        float: left;
        width: 10%;
        padding: 10px;
        /*height: 300px; !* Should be removed. Only for demonstration *!*/
    }
</style>
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
            <form action="{{action('IndicadoresController@store')}}" method="POST">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="nombre"  placeholder="Ingrese el nombre del indicador"/>
                            </div>
                        </div>

                        <label class="cols-sm-2 control-label">Objetivo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="objetivo" placeholder="describa el objetivo"/>
                            </div>
                        </div>

                        <label class="cols-sm-2 control-label">descripcion de la meta</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="mdes" placeholder="describa la meta del indicador"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rut" class="cols-sm-2 control-label">Tipo de calculo</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <select id="calculo">
                                        <option value=1>Porcentual</option>
                                        <option value=2>Cantidad/Cantidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rut" class="cols-sm-2 control-label">Actividad</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <select id="act" onchange="addColumnsParam1()">
                                        <option value=1>Titulados convenio</option>
                                        <option value=2>Convenio</option>
                                        <option value=3>Aprendizaje mas servicio</option>
                                        <option value=4>Extension</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <script>
                            var ext = {!! json_encode($columnasExtension) !!}
                            function addColumnsParam1() {
                                var x = document.getElementById("param1");
                                var option = document.createElement("option");
                                var i;

                                for (i = 1; i < window.ext.length; i++) {
                                    option.text = ext[i];
                                    option.value= i;
                                    x.add(option);
                                    option = document.createElement("option");
                                }
                            }
                        </script>

                        <div class="form-group">
                            <label for="rut" class="cols-sm-2 control-label">parametros</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <div class="column">
                                        <label for="rut" class="cols-sm-2 control-label">parametro1</label>
                                        <select id="param1">
                                            <option value=0>Total de actividades</option>
                                        </select>
                                    </div>
                                    <div class="columnOP">
                                        <br>
                                        /
                                    </div>
                                    <div class="column" id="param2">
                                        <label for="rut" class="cols-sm-2 control-label">parametro2</label>
                                        <select>
                                            <option value=0>Total de actividades</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="cestudiantes" class="cols-sm-2 control-label">Cantidad estudiantes</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="cantidad_estudiantes"   placeholder="Ingrese cantidad de estudiantes"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cestudiantes" class="cols-sm-2 control-label">Cantidad estudiantes</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="cantidad_estudiantes"   placeholder="Ingrese cantidad de estudiantes"/>
                                </div>
                            </div>
                        </div>

                        <label for="exampleInputdate">Año de la meta</label>
                        <input type="date" class="form-control"  name="meta">

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
            <form action="/indicadores" method="POST" id="editForm">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label for="email" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="nombre"  placeholder="Ingrese el nombre del indicador"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">Objetivo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="objetivo" placeholder="describa el objetivo"/>
                            </div>
                        </div>

                        <label for="email" class="cols-sm-2 control-label">descripcion de la meta</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="mdes" placeholder="describa la meta del indicador"/>
                            </div>
                        </div>

                        <label for="exampleInputdate">Año de la meta</label>
                        <input type="date" class="form-control"  name="meta">


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
            <form action="/indicadores" method="POST" id="deleteForm">
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
            <th scope="col">OBJETIVO</th>
            <th scope="col">DESCRIPCION DE LA META</th>
            <th scope="col">INDICADOR1</th>
            <th scope="col">INDICADOR2</th>
            <th scope="col">META DEL AÑO</th>
            <th scope="col">ACCION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($indicadores as $i)
            <tr>
                <th>{{$i->id}}</th>
                <th>{{$i->nombre}}</th>
                <th>{{$i->objetivo}}</th>
                <th>{{$i->meta_descripcion}}</th>
                <td>{{$i->meta1}}</td>
                <td>{{$i->meta2}}</td>
                <td>{{$i->año_meta}}</td>
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
            $('#objetivo').val(data[2]);
            $('#mdes').val(data[3]);
            $('#meta').val(data[4]);

            $('#editForm').attr('action','/act_titulacion_con/'+data[0]);
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
            $('#deleteForm').attr('action','/act_titulacion_con/'+data[0]);
            $('#deleteModal').modal('show');
        });
        //END delete
    });
</script>
</body>
</html>

@endsection
