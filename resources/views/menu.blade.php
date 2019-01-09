@extends('layout.formlayout')
@section('content')
  
  <div>
    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
    <h1>MENÚ</h1>

    <ul>
      <li><a href="/registroconvenio" style="color:white;">Registrar Convenios de Colaboración </a></li>
      <li><a href="/aprendizajes" style="color:white;">Registrar actividad de Aprendizaje + Servicio (A+S)</a></li>
      <li><a href="/extension" style="color:white;">Registrar actividad de extensión</a></li>
      <li><a href="/titulacion" style="color:white;">Registrar actividad de titulación por convenio</a></li>
      <li><a href="/titulados" style="color:white;">Registro Titulados</a></li>
      <li><a href="http://ing.net/" style="color:white;">Cerrar Sesión</a></li>
    </ul>
        </div>
      </div>
    </div>
  </div>

@endsection
