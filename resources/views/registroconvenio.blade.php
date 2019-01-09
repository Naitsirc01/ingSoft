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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Actividad Convenio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{action('RegistroconvenioController@store')}}" method="POST">
      {{csrf_field()}}
      <!-- aca se pegaria el formulario agregar -->
        <div class="modal-body">
          <h5>Registro de convenios de colaboración</h5>
          {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Nombre de la empresa</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="empresa"  pattern="[A-Za-z\s]+" title="Ingrese solo letras" placeholder="Ingrese el nombre"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="convenio" class="cols-sm-2 control-label">Tipo de convenio</label>
            <select name="convenioid" class="form-control">
              <option value="1">Capstone</option>
              <option value="2">Marco</option>
              <option value="3">Especifico</option>
              <option value="4">A+S</option>
            </select>
          </div>

          <div class="form-group">
            <label for="fecha" class="cols-sm-2 control-label">Fecha comienzo del convenio</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                <input type="date" class="form-control" name="fecha_comienzo"   placeholder="Enter your Username"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="duracion" class="cols-sm-2 control-label">Fecha termino del convenio</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                <input type="date" class="form-control" name="duracion"  placeholder="Enter your Password"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="evidencia" class="cols-sm-2 control-label">Evidencia</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-upload fa" aria-hidden="true"></i></span>
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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Actividad Convenio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/registroconvenio" method="POST" id="editForm">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <!-- aca se pegaria el formulario agregar -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Nombre de la empresa</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="empresa" id="empresa" pattern="[A-Za-z\s]+" title="Ingrese solo letras" placeholder="Ingrese el nombre"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="convenio" class="cols-sm-2 control-label">Tipo de convenio</label>
            <select name="convenioid" id="convenioid" class="form-control">
              <option value="1">Capstone</option>
              <option value="2">Marco</option>
              <option value="3">Especifico</option>
              <option value="4">A+S</option>
            </select>
          </div>

          <div class="form-group">
            <label for="fecha" class="cols-sm-2 control-label">Fecha comienzo del convenio</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                <input type="date" class="form-control" name="fecha_comienzo" id="fecha_comienzo"  placeholder="Enter your Username"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="duracion" class="cols-sm-2 control-label">Fecha termino del convenio</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                <input type="date" class="form-control" name="duracion" id="duracion"  placeholder="Enter your Password"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="evidencia" class="cols-sm-2 control-label">Evidencia</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-upload fa" aria-hidden="true"></i></span>
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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Actividad Convenio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/registroconvenio" method="POST" id="deleteForm">
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


  <table id="datatable2" class="table table-striped table-dark">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre Empresa</th>
      <th scope="col">Tipo Convenio</th>
      <th scope="col">Fecha Inicio</th>
      <th scope="col">Duracion</th>
      <th scope="col">Accion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($conv as $convdata)
      <tr>
        <th>{{$convdata->id}}</th>
        <td>{{$convdata->empresa}}</td>
        <td>{{$convdata->convenioid}}</td>
        <td>{{$convdata->fecha_comienzo}}</td>
        <td>{{$convdata->duracion}}</td>
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
    var table = $('#datatable2').DataTable();
    //start edit
    table.on('click','.edit',function(){
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
      }
      var data = table.row($tr).data();
      console.log(data);

      $('#empresa').val(data[1]);
      $('#convenioid').val(data[2]);
      $('#fecha_comienzo').val(data[3]);
      $('#duracion').val(data[4]);


      $('#editForm').attr('action','/registroconvenio/'+data[0]);
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
      $('#deleteForm').attr('action','/registroconvenio/'+data[0]);
      $('#deleteModal').modal('show');
    });
    //END delte
  });
</script>


</body>

</html>