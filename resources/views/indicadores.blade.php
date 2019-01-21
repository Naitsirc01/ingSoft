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
    #inMeta2 {
        display: none;
    }

    #inMeta2.show {
        display: block;
    }

    #inMeta2ed {
        display: none;
    }

    #inMeta2ed.show {
        display: block;
    }
</style>
<body>
<br><br>
<!-- Agregar modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear nuevo indicador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('IndicadoresController@store')}}" method="POST" onsubmit="return confirm('¿Esta seguro que desea agregar este nuevo indicador?');">
            {{csrf_field()}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="nombre" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido" placeholder="Ingrese el nombre del indicador"/>
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
                                    <select name="tipoCal" id="calculo">
                                        <option disabled selected value> -- Selecione actividad -- </option>
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
                                    <select id="act" onchange="addParams(this.value)">
                                        <option disabled selected value> -- Selecione actividad -- </option>
                                        <option value=1>Titulados convenio</option>
                                        <option value=2>Registro de Convenio</option>
                                        <option value=3>Aprendizaje mas servicio</option>
                                        <option value=4>Extension</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rut" class="cols-sm-2 control-label">parametros</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <div class="column">
                                        <label for="rut" class="cols-sm-2 control-label">parametro1</label>
                                        <select name="param1" id="param1">
                                            <option value="Total_de_actividades">Total de actividades</option>
                                            <option value="atc_aprendizaje_mas_serv">actividades A+S</option>
                                            <option value="atc_extension">actividades de extencion</option>
                                            <option value="atc_titulacion_con">titualcion por convenio</option>
                                            <option value="Registroconvenio">registro de convenios</option>
                                        </select>
                                    </div>
                                    <div class="columnOP">
                                        <br>
                                        /
                                    </div>
                                    <div class="column">
                                        <label for="rut" class="cols-sm-2 control-label">parametro2</label>
                                        <select name="param2" id="param2">
                                            <option value="Total_de_actividades">Total de actividades</option>
                                            <option value="atc_aprendizaje_mas_serv">actividades A+S</option>
                                            <option value="atc_extension">actividades de extencion</option>
                                            <option value="atc_titulacion_con">titualcion por convenio</option>
                                            <option value="Registroconvenio">registro de convenios</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="cestudiantes" class="cols-sm-2 control-label">Meta o porcentaje para el parametro 1</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="meta1"   placeholder="Ingrese cantidad de estudiantes"/>
                                </div>
                            </div>
                        </div>

                        <div id="inMeta2">
                            <div class="form-group">
                                <label for="cestudiantes" class="cols-sm-2 control-label">Meta para el parametro 2</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input type="number" class="form-control" name="meta2"   placeholder="Ingrese cantidad de estudiantes"/>
                                    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Actualizar indicador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/indicadores" method="POST" id="editForm" onsubmit="return confirm('¿Esta seguro que desea confirmar los cambios?');">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- aca se pegaria el formulario agregar -->
                <div class="modal-body">
                    <div class="form-group">

                        <label class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z]+[0-9]*" title="Ingrese nombre válido"  placeholder="Ingrese el nombre del indicador"/>
                            </div>
                        </div>

                        <label class="cols-sm-2 control-label">Objetivo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input id="obj" type="text" class="form-control" name="objetivo" placeholder="describa el objetivo"/>
                            </div>
                        </div>

                        <label class="cols-sm-2 control-label">descripcion de la meta</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input id="des" type="text" class="form-control" name="mdes" placeholder="describa la meta del indicador"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rut" class="cols-sm-2 control-label">Tipo de calculo</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <select name="tipoCal" id="calculoed" onchange="hide()">
                                        <option disabled selected value> -- Selecione actividad -- </option>
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
                                    <select id="act" onchange="addParamsed(this.value)">
                                        <option disabled selected value> -- Selecione actividad -- </option>
                                        <option value=1>Titulados convenio</option>
                                        <option value=2>Registro de Convenio</option>
                                        <option value=3>Aprendizaje mas servicio</option>
                                        <option value=4>Extension</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="rut" class="cols-sm-2 control-label">parametros</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <div class="column">
                                        <label for="rut" class="cols-sm-2 control-label">parametro1</label>
                                        <select name="param1" id="param3">
                                            <option value="Total_de_actividades">Total de actividades</option>
                                            <option value="atc_aprendizaje_mas_serv">actividades A+S</option>
                                            <option value="atc_extension">actividades de extencion</option>
                                            <option value="atc_titulacion_con">titualcion por convenio</option>
                                            <option value="Registroconvenio">registro de convenios</option>
                                        </select>
                                    </div>
                                    <div class="columnOP">
                                        <br>
                                        /
                                    </div>
                                    <div class="column">
                                        <label for="rut" class="cols-sm-2 control-label">parametro2</label>
                                        <select name="param2" id="param4">
                                            <option value="Total_de_actividades">Total de actividades</option>
                                            <option value="atc_aprendizaje_mas_serv">actividades A+S</option>
                                            <option value="atc_extension">actividades de extencion</option>
                                            <option value="atc_titulacion_con">titualcion por convenio</option>
                                            <option value="Registroconvenio">registro de convenios</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="cestudiantes" class="cols-sm-2 control-label">Meta o porcentaje para el parametro 1</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                    <input id="meta1ed" type="number" class="form-control" name="meta1"  placeholder="Ingrese cantidad de estudiantes"/>
                                </div>
                            </div>
                        </div>

                        <div id="inMeta2ed">
                            <div class="form-group">
                                <label for="cestudiantes" class="cols-sm-2 control-label">Meta para el parametro 2</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                        <input id="meta2ed" type="number" class="form-control" name="meta2"   placeholder="Ingrese cantidad de estudiantes"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <label for="exampleInputdate">Año de la meta</label>
                        <input id="metaed" type="date" class="form-control"  name="meta">


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
            <th scope="col">DESCRIPCION DE LA META</th>
            {{--<th scope="col">TIPO DE CALCULO</th>--}}
            <th scope="col">PARAMETRO 1</th>
            <th scope="col">PARAMETRO 2</th>
            <th scope="col">META 1</th>
            <th scope="col">META 2</th>
            <th scope="col">META DEL AÑO</th>
            <th scope="col">ACCION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($indicadores as $i)
            <tr>
                <th>{{$i->id}}</th>
                <th>{{$i->nombre}}</th>
                <th><div style="height:80px;width:100%;border:1px solid #fbfffd;font:14px/26px Georgia, Garamond, Serif;overflow:auto;">
                        {{$i->meta_descripcion}}
                    </div>
                </th>
                {{--<th class="hidden">{{$i->tipo_de_calculo}}</th>--}}
                <td>{{$i->parametro1}}</td>
                <td>{{$i->parametro2}}</td>
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

            // var edName=$(table).parents('tr').find('td:nth-child(2)').html();
            // var edObj=$(table).parents('tr').find('td:nth-child(3)').html();
            // var edDes=$(table).parents('tr').find('td:nth-child(4)').html();
            // var meta1=$(table).parents('tr').find('td:nth-child(7)').html();
            // var meta2=$(table).parents('tr').find('td:nth-child(8)').html();
            // var meta=$(table).parents('tr').find('td:nth-child(9)').html();
            //
            // $('#editModal').val($('#nombre').val(edName));
            // $('#editModal').val($('#obj').val(edObj));
            // $('#editModal').val($('#des').val(edDes));
            // $('#editModal').val($('#meta1ed').val(meta1));
            // $('#editModal').val($('#meta2ed').val(meta2));
            // $('#editModal').val($('#metaed').val(meta));

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr=$tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);
            $('#nombre').val(data[1]);
            $('#objetivo').val(data[2]);
            $('#mdes').val(data[3]);
            $('#tipoCal').val(data[4]);
            $('#param1').val(data[5]);
            $('#param2').val(data[6]);
            $('#meta1').val(data[7]);
            $('#meta2').val(data[8]);
            $('#meta').val(data[9]);

            $('#editForm').attr('action','/indicadores/'+data[0]);
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
            $('#deleteForm').attr('action','/indicadores/'+data[0]);
            $('#deleteModal').modal('show');
        });
        //END delete
    });
</script>

<script>
    var ext = {!! json_encode($columnasExtension) !!}
    var apr = {!! json_encode($columnasAprendizajeServicio) !!}
    {{--var reg = {!! json_encode($columnasRegConvenio) !!}--}}
    {{--var ticon = {!! json_encode($columnasTitulacionCon) !!}--}}
    var tablas= {!! json_encode($tablasn) !!}

        function addParams($id) {
            debugger;
            addColumnsParam($id,"param1")
            addColumnsParam($id,"param2")
        }

    function addParamsed($id) {
        debugger;
        addColumnsParam($id,"param3")
        addColumnsParam($id,"param4")
    }

    function addColumnsParam($id,$name) {
        var x = document.getElementById($name);
        var option = document.createElement("option");
        var i;
        var columnas;
        var op=$id;

        switch (op) {
            case '3':
                columnas=apr;
                break;
            case '4':
                columnas=ext;
                break;
            default:
                columnas=[];
                break;
        }
        clearSelect($name);
        option.text = 'Total de actividades';
        option.value= 'Total_de_actividades';
        x.add(option);
        option = document.createElement("option");
        option.text = 'actividades A+S';
        option.value= 'atc_aprendizaje_mas_serv';
        x.add(option);
        option = document.createElement("option");
        option.text = 'actividades de extencion';
        option.value= 'atc_extension';
        x.add(option);
        option = document.createElement("option");
        option.text = 'titualcion por convenio';
        option.value= 'atc_titulacion_con';
        x.add(option);
        option = document.createElement("option");
        option.text = 'registro de convenios';
        option.value= 'Registroconvenio';
        x.add(option);
        option = document.createElement("option");

        if(columnas.length!=0){
            for (i = 0; i < columnas.length; i++) {
                option.text = columnas[i];
                option.value= columnas[i];
                x.add(option);
                option = document.createElement("option");
            }
        }
        for (i = 0; i < tablas.length; i++) {
            option.text = tablas[i];
            option.value= tablas[i];
            x.add(option);
            option = document.createElement("option");
        }

    }

    function clearSelect($list) {
        var select = document.getElementById($list);
        var length = select.options.length;
        for (i = 0; i < length; i++) {
            select.remove(i);
            // select.options[i] = null;
        }
    }
</script>

<script>
    function hide(){
        if(document.getElementById('calculoed').value == "2") {
            document.getElementById("inMeta2ed").classList.add("show");
        }else{
            document.getElementById("inMeta2ed").classList.remove("show");
        }
    }

    const source = document.querySelector("#calculo");
    const target = document.querySelector("#inMeta2");

    const displayWhenSelected = (source, value, target) => {
        const selectedIndex = source.selectedIndex;
        const isSelected = source[selectedIndex].value === value;
        target.classList[isSelected
            ? "add"
            : "remove"
            ]("show");
    };
    source.addEventListener("change", (evt) =>
        displayWhenSelected(source, "2", target)
    );
</script>
</body>
</html>

@endsection
