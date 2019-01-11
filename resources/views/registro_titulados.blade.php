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
                <h5 class="modal-title" id="exampleModalLabel">Registrar titulados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('RegistroTituladosController@store')}}" method="POST">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titulado" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="nombre" pattern="[A-Za-z]+" title="Ingrese nombre válido" placeholder="Ingrese nombre del titulado"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rut" class="cols-sm-2 control-label">Rut</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="rut" pattern="^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$" title="Ingrese rut válido" placeholder="Ingrese rut del titulado"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="cols-sm-2 control-label">Telefono de contacto</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="number" class="form-control" name="telefono" placeholder="Ingrese telefono de contacto"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Correo electronico</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Ingrese correo válido" placeholder="Ingrese email de contacto"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="empresa" class="cols-sm-2 control-label">Nombre de la empresa de trabajo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="empresa" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el nombre de empresa"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="empresa" class="cols-sm-2 control-label">Lugar</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="lugar_trabajo"  placeholder="Ingrese lugar donde trabaja"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="añoTitulacion" class="cols-sm-2 control-label">Año titulacion</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="date" class="form-control" name="anio_titulacion" placeholder="Ingrese año de titulacion"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="carrera" class="cols-sm-2 control-label">Carrera</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="carrera" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el nombre de la carrera"/>
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
                <h5 class="modal-title" id="exampleModalLabel">Registrar titulados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/regitro_titulados" method="POST" id="editForm">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titulado" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="nombre" id="nombre" pattern="[A-Za-z]+" title="Ingrese nombre válido" placeholder="Ingrese nombre del titulado"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rut" class="cols-sm-2 control-label">Rut</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="rut" id="rut" pattern="^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$" title="Ingrese rut válido" placeholder="Ingrese rut del titulado"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="cols-sm-2 control-label">Telefono de contacto</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese telefono de contacto"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Correo electronico</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="correo" id="correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Ingrese rut válido" placeholder="Ingrese email de contacto"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="empresa" class="cols-sm-2 control-label">Nombre de la empresa de trabajo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="empresa" id="empresa" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el nombre de empresa"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="empresa" class="cols-sm-2 control-label">Lugar</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="lugar_trabajo" id="lugar_trabajo" placeholder="Ingrese lugar donde trabaja"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="añoTitulacion" class="cols-sm-2 control-label">Año titulacion</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="date" class="form-control" name="anio_titulacion" id="anio_titulacion" placeholder="Ingrese año de titulacion"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="carrera" class="cols-sm-2 control-label">Carrera</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="text" class="form-control" name="carrera" id="carrera" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el nombre de la carrera"/>
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
                <h5 class="modal-title" id="exampleModalLabel">Registrar titulados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/regitro_titulados" method="POST" id="deleteForm">
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
                <th scope="col">RUT</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">CORREO</th>
                <th scope="col">EMPRESA</th>
                <th scope="col">TRABAJO</th>
                <th scope="col">AÑODETIT</th>
                <th scope="col">CARRERA</th>
                <th scope="col">ACCION</th>
            </tr>
            </thead>
            <tbody>
                @foreach($titulados as $tdata)
                    <tr>
                        <th>{{$tdata->id}}</th>
                        <th>{{$tdata->nombre}}</th>
                        <td>{{$tdata->rut}}</td>
                        <td>{{$tdata->telefono}}</td>
                        <td>{{$tdata->correo}}</td>
                        <td>{{$tdata->empresa}}</td>
                        <th>{{$tdata->lugar_trabajo}}</th>
                        <td>{{$tdata->anio_titulacion}}</td>
                        <td>{{$tdata->carrera}}</td>
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

            $('#editForm').attr('action','/regitro_titulados/'+data[0]);
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
            $('#deleteForm').attr('action','/regitro_titulados/'+data[0]);
            $('#deleteModal').modal('show');
        });
        //END delte
    });
</script>

</body>
</html>
@endsection

