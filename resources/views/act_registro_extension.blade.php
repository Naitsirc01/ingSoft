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
                <h5 class="modal-title" id="exampleModalLabel">Registrar actividad de extensión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('AtcExtensionController@store')}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('¿Esta seguro que desea agregar este nuevo registro?');">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Titulo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <input type="title" class="form-control" name="titulo" pattern="([A-Za-z]+[\s]?[0-9]*[\s]?)+" title="Ingrese nombre válido" placeholder="Ingrese el titulo de la actividad"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Seleccione la actividad a registrar</label>
                        <select name="tipo_extension"  class="form-control">
                            <option value="Charla">Charla</option>
                            <option value="Curso">Curso</option>
                            <option value="Talleres">Talleres</option>
                            <option value="Seminario">Seminario</option>
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
                                <input type="text" class="form-control" name="expositor[]" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\s]*)+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del expositor"/>
                            </div>
                        </div>
                    </div>
                    <div id="aumentar">
                    </div>
                    <button type="button" onclick="agregar()"> agregar </button>
                    <br>
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

                    <div id="aumentar1">
                        <label for="email" class="cols-sm-2 control-label">Organizador de la actividad</label>
                        <select class="form-control" name="organizador[]" placeholder="Registrar Organizador">
                            <option disabled selected value> -- Selecione un profesor -- </option>
                            @foreach($profesores as $p)
                                <option value={{$p->id}}>{{$p->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" onclick="agregar1()"> agregar </button>
                    <br>
                    <!--Subir pdf-->
                    <div class="form-group">
                        <label for="evidencia" class="cols-sm-2 control-label">Subir lista asistencia</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="file" class="form-control" name="evidencia"  >
                            </div>
                        </div>
                    </div>
                    <!--FIN Subir pdf-->





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
            <form action="/act_regitro_extension" method="POST" id="editForm" enctype="multipart/form-data" onsubmit="return confirm('¿Esta seguro que desea confirmar los cambios?');">
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
                            <option value="Charla">Charla</option>
                            <option value="Curso">Curso</option>
                            <option value="Talleres">Talleres</option>
                            <option value="Seminario">Seminario</option>
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
                                <input type="text" class="form-control" name="expositor[]" id="expositor" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\s]*)+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del expositor"/>
                            </div>
                        </div>
                    </div>
                    <div id="aumentar2">
                    </div>
                    <button type="button" onclick="agregar2()"> agregar </button>
                    <br>
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

                    <div id="aumentar3">
                        <label for="email" class="cols-sm-2 control-label">Organizador de la actividad</label>
                        <select class="form-control" name="organizador[]" id="organizador" placeholder="Registrar Organizador">
                            <option disabled selected value> -- Selecione un profesor -- </option>
                            @foreach($profesores as $p)
                                <option value={{$p->id}}>{{$p->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" onclick="agregar3()"> agregar </button>
                    <br>
                    <div class="input-group">
                        <div class="custom-file" id=$extensiones->id >

                            <input type="file" class="custom-file-input" name="evidencia" id="evidencia" >
                            <label id="fileNameEd" class="custom-file-label"></label>

                        </div>
                    </div>
                    {{--
                    <div class="form-group">
                        <div id="nArchivo"></div>
                        <label for="evidencia" class="cols-sm-2 control-label">Subir lista asistencia</label>
                        <div class="cols-sm-10">
                            <div class="input-group">

                                <input type="file" class="form-control" name="evidencia" id="evidencia">

                            </div>
                        </div>
                    </div>
                    --}}

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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar actividad de extensión</h5>
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
            <th scope="col">Titulo</th>
            <th scope="col">Expositor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Organizador</th>
            <th scope="col">Tipo</th>
            <th scope="col">Evidencia</th>
            <th scope="col">Accion</th>
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
                @if($tdata->profesor2 == null)
                    <td>{{$tdata->profesor1->nombre}}</td>
                @else
                    <td>{{$tdata->profesor1->nombre}}<p></p>{{$tdata->profesor2->nombre}}</td>
                @endif
                <td>{{$tdata->tipo_extension}}</td>

                    <td>
                        @foreach($tdata->evidencia as $ext)
                            <a href="{{route('downloadfile', $ext->id)}}"
                            class="btn btn-default"><i class="fa fa-download" style="font-size:24px"></i></a>
                        @endforeach
                    </td>

                <td>
                    <a href="#" class="btn btn-default edit"><i class="fa fa-edit" style="font-size:24px"></i></a>
                    <a href="#" class="btn btn-default delete"><i class="fa fa-times" style="font-size:24px"></i></a>
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

            $('#titulo').val(data[1]);
            $('#expositor').val(data[2]);
            $('#fecha').val(data[3]);
            $('#ubicacion').val(data[4]);
            $('#cantidad_asistentes').val(data[5]);
            $('#organizador').val(data[6]);
            $('#tipo_extension').val(data[7]);
            $('#fileNameEd').text(buscarArchivo(data[0]));
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
<script>
    var evi={!! $evidencias !!};
    function buscarArchivo($id) {
        var $i;
        debugger;
        for($i=0;$i<window.evi.length;$i++){
            if(evi[$i].atc_extension_id == $id){
                var aux=evi[$i].nombre;
                return evi[$i].nombre;
            }
        }

    }
</script>

<script>
    var l = 0;
    function agregar() {
        if (l<1) {
            $("#aumentar").append('<label for="username" class="cols-sm-2 control-label">Expositor</label>\n' +
                '                        <div class="cols-sm-10">\n' +
                '                            <div class="input-group">\n' +
                '                                <input type="text" class="form-control" name="expositor[]" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\\s]*)+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del expositor"/>\n' +
                '                            </div>\n' +
                '                        </div>');
            l++;
        }
    }
</script>
<script>
    var i = 0;
    function agregar1() {
        if (i<1) {
            $("#aumentar1").append('<label for="email" class="cols-sm-2 control-label">Organizador de la actividad</label>\n' +
                '                        <select class="form-control" name="organizador[]" placeholder="Registrar Organizador">\n' +
                '                            <option disabled selected value> -- Selecione un profesor -- </option>\n' +
                '                            @foreach($profesores as $p)\n' +
                '                                <option value={{$p->id}}>{{$p->nombre}}</option>\n' +
                '                            @endforeach\n' +
                '                        </select>');
            i++;
        }
    }
</script>
<script>
    var j = 0;
    function agregar2() {
        if (j<1) {
            $("#aumentar2").append('<label for="username" class="cols-sm-2 control-label">Expositor</label>\n' +
                '                        <div class="cols-sm-10">\n' +
                '                            <div class="input-group">\n' +
                '                                <input type="text" class="form-control" name="expositor[]" id="expositor" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\\s]*)+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del expositor"/>\n' +
                '                            </div>\n' +
                '                        </div>');
            j++;
        }
    }
</script>
<script>
    var k = 0;
    function agregar3() {
        if (k<1) {
            $("#aumentar3").append('<label for="email" class="cols-sm-2 control-label">Organizador de la actividad</label>\n' +
                '                        <select class="form-control" name="organizador[]" id="organizador" placeholder="Registrar Organizador">\n' +
                '                            <option disabled selected value> -- Selecione un profesor -- </option>\n' +
                '                            @foreach($profesores as $p)\n' +
                '                                <option value={{$p->id}}>{{$p->nombre}}</option>\n' +
                '                            @endforeach\n' +
                '                        </select>');
            k++;
        }
    }
</script>
</body>
</html>
@endsection

