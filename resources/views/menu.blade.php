@extends('layout.formlayout')
@section('content')
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  </head>
  <style>
      .button {
          background-color: lightblue;
          border: solid;
          color: black;
          width: 450px;
          height: 40px;
          margin: 2px;
          /*padding: 10px 120px;*/
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 20px;
      }
  </style>

  
  <div>
    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
    <h1 align="center">MENÚ</h1>

    <ul>
        {{--Admin--}}
        @if($tipoUsuario==1)
            <a href="/indicadores" class="button">Consultar indicadores</a>
            <a href="/reg_registro_convenio" class="button">Registrar Convenios de Colaboración</a>
            <a href="/act_aprendizaje_servicio" class="button">Registrar actividad de Aprendizaje + Servicio (A+S)</a>
            <a href="/act_regitro_extension" class="button">Registrar actividad de extensión</a>
            <a href="/act_titulacion_con" class="button">Registrar actividad de titulación por convenio</a>
            <a href="/regitro_titulados" class="button">Registro Titulados</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               {{ __('Logout') }} class="button">Cerrar Sesión</a>
        @endif

        {{--Encargado--}}
        @if($tipoUsuario==2)
            <a href="/indicadores" class="button">Consultar indicadores</a>
            <a href="/reg_registro_convenio" class="button">Registrar Convenios de Colaboración</a>
            <a href="/act_aprendizaje_servicio" class="button">Registrar actividad de Aprendizaje + Servicio (A+S)</a>
            <a href="/act_regitro_extension" class="button">Registrar actividad de extensión</a>
                <a href="/act_titulacion_con" class="button">Registrar actividad de titulación por convenio</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               {{ __('Logout') }} class="button">Cerrar Sesión</a>
        @endif

        {{--Secretaria--}}
        @if($tipoUsuario==3)
            <a href="/reg_registro_convenio" class="button">Registrar Convenios de Colaboración</a>
            <a href="/act_aprendizaje_servicio" class="button">Registrar actividad de Aprendizaje + Servicio (A+S)</a>
            <a href="/act_regitro_extension" class="button">Registrar actividad de extensión</a>
            <a href="/act_titulacion_con" class="button">Registrar actividad de titulación por convenio</a>
            <a href="/regitro_titulados" class="button">Registro Titulados</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               {{ __('Logout') }} class="button">Cerrar Sesión</a>
        @endif

        {{--Academico--}}
        @if($tipoUsuario==4)
            <a href="/reg_registro_convenio" class="button">Registrar Convenios de Colaboración</a>
            <a href="/act_regitro_extension" class="button">Registrar actividad de extensión</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               {{ __('Logout') }} class="button">Cerrar Sesión</a>
        @endif

        {{--Director--}}
        @if($tipoUsuario==5)
            <a href="/indicadores" class="button">Consultar indicadores</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               {{ __('Logout') }} class="button">Cerrar Sesión</a>
        @endif

        {{--Jefe de carrera--}}
        @if($tipoUsuario==6)
            <a href="/indicadores" class="button">Consultar indicadores</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               {{ __('Logout') }} class="button">Cerrar Sesión</a>
        @endif

        {{--Usuario .-.--}}
        @if($tipoUsuario==7)
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               {{ __('Logout') }} class="button">Cerrar Sesión</a>
        @endif

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </ul>
        </div>
      </div>
    </div>
  </div>

@endsection
