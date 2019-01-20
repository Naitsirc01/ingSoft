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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Convenio de Colaboración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{action('RegistroConvenioController@store')}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('¿Esta seguro que desea agregar este nuevo registro?');">
      {{csrf_field()}}
      <!-- aca se pegaria el formulario agregar -->
        <div class="modal-body">
          <div class="form-group">
            <label for="titulado" class="cols-sm-2 control-label">Empresa</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <input type="text" class="form-control" name="nombre" pattern="[[A-Za-z-ñÑáéíóúÁÉÍÓÚüÜ]+[0-9]*]+" title="Ingrese nombre válido" placeholder="Ingrese nombre de la empresa"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="rut" class="cols-sm-2 control-label">Tipo de convenio</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <select id="tipoCon" name="tipoCon">
                  @foreach($tipoCon as $t)
                    <option value={{$t->id}}>{{$t->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="telefono" class="cols-sm-2 control-label">Fecha de comienzo</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <input type="date" class="form-control" name="fecha" placeholder="Ingrse fecha de comienzo"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Años de duración</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <input type="number" class="form-control" name="duracion" placeholder="Ingrese los años de duración del convenio"/>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label for="evidencia" class="cols-sm-2 control-label">Evidencia</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <input type="file" class="form-control" name="evidencia"  value="">

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
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Convenio de Colaboración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/act_registro_convenio" method="POST" id="editForm" enctype="multipart/form-data" onsubmit="return confirm('¿Esta seguro que desea confirmar los cambios?');">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <!-- aca se pegaria el formulario agregar -->
        <div class="modal-body">
          <div class="form-group">
            <label for="titulado" class="cols-sm-2 control-label">Empresa</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <input type="text" class="form-control" name="nombre" id="nombre" pattern="[[A-Za-z-ñÑáéíóúÁÉÍÓÚüÜ]+[0-9]*]+" title="Ingrese nombre válido" placeholder="Ingrese nombre de la empresa"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="rut" class="cols-sm-2 control-label">Tipo de convenio</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <select id="tipoCon" name="tipoCon">
                  @foreach($tipoCon as $t)
                    <option value={{$t->id}}>{{$t->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="telefono" class="cols-sm-2 control-label">Fecha de comienzo</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <input type="date" class="form-control" name="fecha" id="fecha"  placeholder="Ingrese fecha de comienzo"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Años de duración</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <input type="number" class="form-control" name="duracion" id="duracion" placeholder="Ingrese los años de duración del convenio"/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="evidencia" class="cols-sm-2 control-label">Evidencia</label>
            <div class="cols-sm-10">
              <div class="input-group">

                <input type="file" class="form-control" name="evidencia" id="evidencia" value="">

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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Convenio de Colaboración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/act_registro_convenio" method="POST" id="deleteForm">
      {{csrf_field()}}
      {{method_field('DELETE')}}
      <!-- aca se pegaria el formulario agregar (kappita) -->
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
      <th scope="col">EMPRESA</th>
      <th scope="col">CONVENIO</th>
      <th scope="col">FECHA DE COMIENZO</th>
      <th scope="col">DURACION</th>
      <th scope="col">ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($conv as $c)
      <tr>
        <th>{{$c->id}}</th>
        <th>{{$c->empresa}}</th>
        <td>{{$c->convenioid}}</td>
        <td>{{$c->fecha_comienzo}}</td>
        <td>{{$c->duracion}}</td>
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

      $('#nombre').val(data[1]);
      $('#tipoCon').val(data[2]);
      $('#fecha').val(data[3]);
      $('#duracion').val(data[4]);

      $('#editForm').attr('action','/reg_registro_convenio/'+data[0]);
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
      $('#deleteForm').attr('action','/reg_registro_convenio/'+data[0]);
      $('#deleteModal').modal('show');
    });
    //END delte
  });

</script>

</body>
</html>

@endsection
