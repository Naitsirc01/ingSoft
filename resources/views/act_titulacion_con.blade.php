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
                <h5 class="modal-title" id="exampleModalLabel">Registrar actividad de titulación por convenio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('AtcTitulacionConController@store')}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('¿Esta seguro que desea agregar este nuevo registro?');">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label for="name" class="cols-sm-2 control-label">Titulo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="titulo" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido"  placeholder="Ingrese el titulo de la actividad"/>
                            </div>
                        </div>

                        <br>
                        <h5>Estudiantes</h5>

                        <div id="aumentar">
                            <label for="nombre" class="cols-sm-2 control-label">Nombre</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                    <input type="text" class="form-control" name="nombre[]" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\s]*)+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del estudiante"/>
                                </div>
                            </div>

                            <label for="rut" class="cols-sm-2 control-label">Rut (utilice puntos y guion)  </label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                    <input type="text" class="form-control" name="rut[]" pattern="^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$" title="Ingrese rut válido" placeholder="Ingrese el rut del estudiante"/>
                                </div>
                            </div>
                            <label for="name" class="cols-sm-2 control-label">Seleccione la Carrera</label>
                            <select class="form-control" name="carrera[]"  placeholder="Registrar cositos">
                                <option>ICCI</option>
                                <option>ICI</option>
                                <option>ICA</option>
                                <option>ICdM</option>
                                <option>ICM</option>
                                <option>ICPC</option>
                                <option>ICQ</option>
                                <option>IC</option>
                            </select>
                        </div>

                        <button type="button" onclick="agregar()"> agregar </button>
                        <br>


                        <label for="exampleInputdate">Fecha de inicio</label>
                        <input type="date" class="form-control"  name="fecha_inicio">

                        <label for="exampleInputdate">Fecha de termino (opcional)</label>
                        <input type="date" class="form-control"  name="fecha_termino">




                        <div id="aumentar1" class="cols-sm-10">
                            <label for="email" class="cols-sm-2 control-label">Nombre profesor guia</label>
                            <select class="form-control" name="profesor[]"  placeholder="Registrar profesor">
                                <option disabled selected value> -- Selecione un profesor -- </option>
                                @foreach($profesores as $p)
                                    <option value={{$p->id}}>{{$p->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div >
                        </div>
                        <button type="button" onclick="agregar1()"> agregar </button>
                        <br>
                        <label for="email" class="cols-sm-2 control-label">Nombre empresa</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="empresa" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido"  placeholder="Ingrese el nombre de la empresa donde se realiza"/>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="evidencia" class="cols-sm-2 control-label">Subir evidencia</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input type="file" class="form-control" name="evidencia"  >
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
                <h5 class="modal-title" id="exampleModalLabel">Actualizar actividad de titulación por convenio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/act_titulacion_con" method="POST" id="editForm" enctype="multipart/form-data" onsubmit="return confirm('¿Esta seguro que desea confirmar los cambios?');">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label for="name" class="cols-sm-2 control-label">Titulo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="titulo" id="titulo" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el titulo de la actividad"/>
                            </div>
                        </div>


                        <div id="aumentar3">
                            <label for="email" class="cols-sm-2 control-label">Nombre</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                    <input type="text" class="form-control" name="nombre[]" id="nombre" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\s]*)+" title="Ingrese nombre válido"  placeholder="Ingrese el nombre del estudiante"/>
                                </div>
                            </div>

                            <label for="email" class="cols-sm-2 control-label">Rut</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                    <input type="text" class="form-control" name="rut[]" id="rut" pattern="^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$" title="Ingrese rut válido" placeholder="Ingrese el rut del estudiante"/>
                                </div>
                            </div>

                            <label for="name" class="cols-sm-2 control-label">Seleccione la Carrera</label>
                            <select class="form-control" name="carrera[]" id="carrera" placeholder="Registrar cositos">
                                <option>ICCI</option>
                                <option>ICI</option>
                                <option>ICA</option>
                                <option>ICdM</option>
                                <option>ICM</option>
                                <option>ICPC</option>
                                <option>ICQ</option>
                                <option>IC</option>
                            </select>
                        </div>
                        <button type="button" onclick="agregar3()"> agregar </button>
                        <br>
                        <!--button type="button" onclick="agregar2()"> agregar </button-->

                        <label for="exampleInputdate">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">

                        <label for="exampleInputdate">Fecha de termino (opcional)</label>
                        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino">

                        <div id="aumentar5">
                            <label for="email" class="cols-sm-2 control-label">Nombre profesor guia (Max:2)</label>
                            <select class="form-control" name="profesor[]" id="profesor" placeholder="Registrar profesor">
                                <option disabled selected value> -- Selecione un profesor -- </option>
                                @foreach($profesores as $p)
                                    <option value={{$p->id}}>{{$p->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" onclick="agregar5()"> agregar </button>
                        <br>
                        <label for="email" class="cols-sm-2 control-label">Nombre empresa</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="empresa" id="empresa" pattern="[A-Za-z]+" title="Ingrese nombre válido" placeholder="Ingrese el nombre de la empresa donde se realiza"/>
                            </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Registrar actividad de titulación por convenio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/act_titulacion_con" method="POST" id="deleteForm">
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
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Rut</th>
                <th scope="col">Carrera</th>
                <th scope="col">Fecha inicio</th>
                <th scope="col">Fecha termino</th>
                <th scope="col">Profesor</th>
                <th scope="col">Empresa</th>
                <th scope="col">Evidencia</th>
                <th scope="col">Accion</th>
            </tr>
            </thead>
            <tbody>
                @foreach($titulacions as $tdata)
                    <tr>
                        <th>{{$tdata->id}}</th>
                        <th>{{$tdata->titulo}}</th>

                        {{--<td>{{$tdata->nombre1}}<br>{{$tdata->nombre2}}<br>{{$tdata->nombre3}}<br>{{$tdata->nombre4}}</td>--}}

                        @if($tdata->nombre2 == null && $tdata->nombre3 == null && $tdata->nombre4 == null)
                            <td>{{$tdata->nombre1}}</td>
                        @elseif( $tdata->nombre3 == null && $tdata->nombre4 == null)
                            <td>{{$tdata->nombre1}}<h1></h1>{{$tdata->nombre2}}</td>
                        @elseif( $tdata->nombre4 == null)
                            <td>{{$tdata->nombre1}}<h1></h1>{{$tdata->nombre2}}<h1></h1>{{$tdata->nombre3}}</td>
                        @else
                            <td>{{$tdata->nombre1}}<h1></h1>{{$tdata->nombre2}}<h1></h1>{{$tdata->nombre3}}}<h1></h1>{{$tdata->nombre4}}</td>
                        @endif


                        @if($tdata->rut2 == null && $tdata->rut3 == null && $tdata->rut4 == null)
                            <td>{{$tdata->rut1}}</td>
                        @elseif( $tdata->rut3 == null && $tdata->rut4 == null)
                            <td>{{$tdata->rut1}}<h1></h1>{{$tdata->rut2}}</td>
                        @elseif( $tdata->rut4 == null)
                            <td>{{$tdata->rut1}}<h1></h1>{{$tdata->rut2}}<h1></h1>{{$tdata->rut3}}</td>
                        @else
                            <td>{{$tdata->rut1}}<h1></h1>{{$tdata->rut2}}<h1></h1>{{$tdata->rut3}}}<h1></h1>{{$tdata->rut4}}</td>
                        @endif


                        @if($tdata->carrera2 == null && $tdata->carrera3 == null && $tdata->carrera4 == null)
                            <td>{{$tdata->carrera1}}</td>
                        @elseif( $tdata->carrera3 == null && $tdata->carrera4 == null)
                            <td>{{$tdata->carrera1}}<h1></h1>{{$tdata->carrera2}}</td>
                        @elseif( $tdata->carrera4 == null)
                            <td>{{$tdata->carrera1}}<h1></h1>{{$tdata->carrera2}}<h1></h1>{{$tdata->carrera3}}</td>
                        @else
                            <td>{{$tdata->carrera1}}<h1></h1>{{$tdata->carrera2}}<h1></h1>{{$tdata->carrera3}}}<h1></h1>{{$tdata->carrera4}}</td>
                        @endif


                        <td>{{$tdata->fecha_inicio}}</td>
                        <td>{{$tdata->fecha_termino}}</td>
                        @if($tdata->profesor2 == null)
                        <td>{{$tdata->profesor1->nombre}}</td>
                        @else
                            <td>{{$tdata->profesor1->nombre}}<p></p>{{$tdata->profesor2->nombre}}</td>
                        @endif
                        <td>{{$tdata->empresa}}</td>
                        <td><a href="{{route('downloadfile', $tdata->evidencia->id)}}"
                               class="btn btn-default"><i class="fa fa-download" style="font-size:24px"></i></a></td>
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
            var datos1=[];
            var datos2=[];
            var datos3=[];
            var datos4=[];
            datos1=findDatas(data[0],1)
            datos2=findDatas(data[0],2)
            datos3=findDatas(data[0],3)
            datos4=findDatas(data[0],4)
            $('#nombre').val(datos1[0]);
            $('#rut').val(datos1[1]);
            $('#carrera').val(datos1[2]);

            $('#nombre0').val(datos2[0]);
            $('#rut0').val(datos2[1]);
            $('#carrera0').val(datos2[2]);

            $('#nombre1').val(datos3[0]);
            $('#rut1').val(datos3[1]);
            $('#carrera1').val(datos3[2]);

            $('#nombre2').val(datos4[0]);
            $('#rut2').val(datos4[2]);
            $('#carrera2').val(datos4[3]);

            $('#fecha_inicio').val(data[5]);
            $('#fecha_termino').val(data[6]);
            $('#profesor').val(data[7]);
            $('#empresa').val(data[8]);


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
<script>
    var titu={!! $titulacions !!};
    function findDatas($id,$op) {
        var $i;
        var $pos;
        for($i=0;$i<window.titu.length;$i++){
            agregar3();
            if(titu[$i].id == $id){
                $pos=$i;
                break;
            }
        }
        debugger;
        var datos=[];
        switch ($op) {
            case 1:
                datos.push(titu[$pos].nombre1);
                datos.push(titu[$pos].rut1);
                datos.push(titu[$pos].carrera1);
                return datos;
            case 2:
                datos.push(titu[$pos].nombre2);
                datos.push(titu[$pos].rut2);
                datos.push(titu[$pos].carrera2);
                return datos;
            case 3:
                datos.push(titu[$pos].nombre3);
                datos.push(titu[$pos].rut3);
                datos.push(titu[$pos].carrera3);
                return datos;
            case 4:
                datos.push(titu[$pos].nombre4);
                datos.push(titu[$pos].rut4);
                datos.push(titu[$pos].carrera4);
                return datos;
        }
    }
    {{--function findRut($id,$op) {--}}
        {{--var titu={!! $titulacions !!};--}}
        {{--var $i;--}}
        {{--var $pos;--}}
        {{--for($i=0;$i<window.titu.length;$i++){--}}

            {{--if(titu[$i].id == $id){--}}
                {{--$pos=$i;--}}
                {{--break;--}}
            {{--}--}}
        {{--}--}}
        {{--switch ($op) {--}}
            {{--case 1:--}}
                {{--return titu[$pos].rut1;--}}
            {{--case 2:--}}
                {{--return titu[$pos].rut2;--}}
            {{--case 3:--}}
                {{--return titu[$pos].rut3;--}}
            {{--case 4:--}}
                {{--return titu[$pos].rut4;--}}
        {{--}--}}
    {{--}--}}
</script>

<script>
    var evi={!! $evidencias !!};
    function buscarArchivo($id) {
        var $i;
        debugger;
        for($i=0;$i<window.evi.length;$i++){
            if(evi[$i].atc_titulacion_con_id == $id){
                var aux=evi[$i].nombre;
                return evi[$i].nombre;
            }
        }

    }
</script>

<script>
    var i = 0;
    function agregar() {
        if (i<3) {
            $("#aumentar").append('<label for="nombre" class="cols-sm-2 control-label">Nombre</label>\n' +
                '                            <div class="cols-sm-10">\n' +
                '                                <div class="input-group">\n' +
                '                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->\n' +
                '                                    <input id="nombre" type="text" class="form-control" name="nombre[]" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\\s]*)+" title="Ingrese nombre válido" placeholder="Ingrese el nombre del estudiante"/>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '\n' +
                '                            <label for="rut" class="cols-sm-2 control-label">Rut</label>\n' +
                '                            <div class="cols-sm-10">\n' +
                '                                <div class="input-group">\n' +
                '                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->\n' +
                '                                    <input type="text" class="form-control" name="rut[]" pattern="^\\d{1,2}\\.\\d{3}\\.\\d{3}[-][0-9kK]{1}$" title="Ingrese rut válido" placeholder="Ingrese el rut del estudiante"/>\n' +
                '                                </div>\n' +
                '                            </div>' +
                '' +
                '<label for="name" class="cols-sm-2 control-label">Seleccione la Carrera</label>\n' +
                '                        <select class="form-control" name="carrera[]"  placeholder="Registrar cositos">\n' +
                '                            <option>ICCI</option>\n' +
                '                            <option>ICI</option>\n' +
                '                            <option>ICA</option>\n' +
                '                            <option>ICdM</option>\n' +
                '                            <option>ICM</option>\n' +
                '                            <option>ICPC</option>\n' +
                '                            <option>ICQ</option>\n' +
                '                            <option>IC</option>\n' +
                '                        </select>');
            i++;
        }

    };
</script>
<script>
    var j = 0;
    function agregar1() {
        if (j<1) {
            $("#aumentar1").append('<label for="email" class="cols-sm-2 control-label">Nombre profesor guia</label>\n' +
                '                            <select class="form-control" name="profesor[]"  placeholder="Registrar profesor">\n' +
                '                                <option disabled selected value> -- Selecione un profesor -- </option>\n' +
                '                                @foreach($profesores as $p)\n' +
                '                                    <option value={{$p->id}}>{{$p->nombre}}</option>\n' +
                '                                @endforeach\n' +
                '                            </select>');
            j++;
        }
    };
</script>
<script>
    var k = 0;
    function agregar3() {
        if (k<3) {
            $("#aumentar3").append('<label for="email" class="cols-sm-2 control-label">Nombre</label>\n' +
                '                            <div class="cols-sm-10">\n' +
                '                                <div class="input-group">\n' +
                '                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->\n' +
                '                                    <input id=nombre'+k+' type="text" class="form-control" name="nombre[]" id="nombre" pattern="([A-ZÁÉÍÓÚÑ]{1}[a-zñáéíóú]{1,24}[\\s]*)+" title="Ingrese nombre válido"  placeholder="Ingrese el nombre del estudiante"/>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '\n' +
                '                            <label for="email" class="cols-sm-2 control-label">Rut</label>\n' +
                '                            <div class="cols-sm-10">\n' +
                '                                <div class="input-group">\n' +
                '                                    <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->\n' +
                '                                    <input id =rut'+k+' type="text" class="form-control" name="rut[]" id="rut" pattern="^\\d{1,2}\\.\\d{3}\\.\\d{3}[-][0-9kK]{1}$" title="Ingrese rut válido" placeholder="Ingrese el rut del estudiante"/>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '\n' +
                '                            <label for="name" class="cols-sm-2 control-label">Seleccione la Carrera</label>\n' +
                '                            <select class="form-control" name="carrera[]" id="carrera" placeholder="Registrar carrera">\n' +
                '                                <option>ICCI</option>\n' +
                '                                <option>ICI</option>\n' +
                '                                <option>ICA</option>\n' +
                '                                <option>ICdM</option>\n' +
                '                                <option>ICM</option>\n' +
                '                                <option>ICPC</option>\n' +
                '                                <option>ICQ</option>\n' +
                '                                <option>IC</option>\n' +
                '                            </select>');
            k++;
        }
    };
</script>
<script>
    var j1 = 0;
    function agregar5() {
        if (j1<1) {
            $("#aumentar5").append('<label for="email" class="cols-sm-2 control-label">Nombre profesor guia</label>\n' +
                '                            <select class="form-control" name="profesor[]" id="profesor" placeholder="Registrar profesor">\n' +
                '                                <option disabled selected value> -- Selecione un profesor -- </option>\n' +
                '                                @foreach($profesores as $p)\n' +
                '                                    <option value={{$p->id}}>{{$p->nombre}}</option>\n' +
                '                                @endforeach\n' +
                '                            </select>');
            j1++;
        }
    }
</script>
</body>
</html>

@endsection
