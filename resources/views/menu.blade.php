@extends('layout.formlayout')
@section('content')
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  </head>

  
  <div>
    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
    <h1>MENÚ</h1>

    <ul>
      <li><a href="/indicadores" style="color:white;">Consultar indicadores</a></li>
      <li><a href="/reg_registro_convenio" style="color:white;">Registrar Convenios de Colaboración </a></li>
      <li><a href="/act_aprendizaje_servicio" style="color:white;">Registrar actividad de Aprendizaje + Servicio (A+S)</a></li>
      <li><a href="/act_regitro_extension" style="color:white;">Registrar actividad de extensión</a></li>
      <li><a href="/act_titulacion_con" style="color:white;">Registrar actividad de titulación por convenio</a></li>
      <li><a href="/regitro_titulados" style="color:white;">Registro Titulados</a></li>
      <li><a href="http://ing.net/" style="color:white;">Cerrar Sesión</a></li>
    </ul>
        </div>
      </div>
    </div>
  </div>

@endsection
