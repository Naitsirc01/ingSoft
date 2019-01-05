@extends('layout.formlayout')
@section('content')

  <div class="container">
    <div class="row main">
      <div class="main-login main-center">
        <h5>Registro de convenios de colaboración</h5>
        <form class="" method="post" action="actividad_convenio" enctype="multipart/form-data">
            {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Nombre de la empresa</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="name" id="name"  placeholder="Ingrese el nombre"/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="convenio" class="cols-sm-2 control-label">Tipo de convenio</label>
            <select name="convenio" id="convenio" class="form-control">
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
                <input type="date" class="form-control" name="fecha" id="fecha"  placeholder="Enter your Username"/>
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

          <div class="form-group ">
            <button id="button" class="btn btn-primary btn-lg btn-block login-button">Register</button>
          </div>

        </form>
      </div>
    </div>
  </div>

@endsection
