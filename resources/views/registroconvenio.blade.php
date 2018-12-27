@extends('layout.mainlayout')
@section('content')

  <div>
    
    <style>
      #playground-container {
        height: 500px;
        overflow: hidden !important;
        -webkit-overflow-scrolling: touch;
      }
      body, html{
        height: 100%;
        background-repeat: no-repeat;
        background:url(https://i.ytimg.com/vi/4kfXjatgeEU/maxresdefault.jpg);
        font-family: 'Oxygen', sans-serif;
        background-size: cover;
      }

      .main{
        margin:50px 15px;
      }

      h1.title {
        font-size: 50px;
        font-family: 'Passion One', cursive;
        font-weight: 400;
      }

      hr{
        width: 10%;
        color: #fff;
      }

      .form-group{
        margin-bottom: 15px;
      }

      label{
        margin-bottom: 15px;
      }

      input,
      input::-webkit-input-placeholder {
        font-size: 11px;
        padding-top: 3px;
      }

      .main-login{
        background-color: #fff;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

      }
      .form-control {
        height: auto!important;
        padding: 8px 12px !important;
      }
      .input-group {
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
      }
      #button {
        border: 1px solid #ccc;
        margin-top: 28px;
        padding: 6px 12px;
        color: #666;
        text-shadow: 0 1px #fff;
        cursor: pointer;
        -moz-border-radius: 3px 3px;
        -webkit-border-radius: 3px 3px;
        border-radius: 3px 3px;
        -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
        -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
        box-shadow: 0 1px #fff inset, 0 1px #ddd;
        background: #f5f5f5;
        background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
        background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
      }
      .main-center{
        margin-top: 30px;
        margin: 0 auto;
        max-width: 400px;
        padding: 10px 40px;
        background:#009edf;
        color: #FFF;
        text-shadow: none;
        -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
        -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
        box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

      }
      span.input-group-addon i {
        color: #009edf;
        font-size: 17px;
      }

      .login-button{
        margin-top: 5px;
      }

      .login-register{
        font-size: 11px;
        text-align: center;
      }
    </style>
      <!--
     <!DOCTYPE html>
     <html>
     <head>
       <title>Formulario</title>
       <meta charset="utf-8">
       <link type="text/css" href="./../css/style.css" rel="stylesheet" />
     </head>

     <body>
     <div id="registrar">
       <a href="../index.php"</a>Regresar</a>
     </div>
     <div id="envoltura">
       <div id="contenedor">

         <!div id="cabecera">
           <!img src="./../css/images/logo.gif" >
         <!/div>

         <div id="cuerpo">

           <form id="form-login" action="#" method="post" >
             <p><label for="nombre">Nombre de la empresa o convenio :</label></p>
             <input name="nombre" type="text" id="nombre" class="nombre" placeholder="ingrese nombre" autofocus=""/ ></p>

             <!--=============================================================================================-->
            <!--La sisguientes 2 líneas son para agregar campos al formulario con sus respectivos labels-->
            <!--Puedes usar tantas como necesites-->
    <!--
    <p><label for="tipoCon">Tipo de convenio:</label></p>
    <input name="tipoCon" type="text" id="tipoCon" class="tipoCon" placeholder="ingrese tipo" /></p>
    <!--=============================================================================================-->
    <!--
            <p><label for="fecha">Fecha comienzo del convenio:</label></p>
            <input name="fecha" type="date" id="fecha" class="fecha" placeholder="indique fecha" /></p>

            <p><label for="duracion">Duracion del convenio:</label></p>
            <input name="duracion" type="number" id="duracion" class="duracion" placeholder="duracion"/ ></p>

            <p><label for="evidencia">Evidencia:</label></p>
            <input name="evidencia" type="file" id="evidencia" class="evidencia" placeholder="ingrese evidencia" /></p>

            <p id="bot"><input name="submit" type="submit" id="boton" value="Registrar" class="boton"/></p>

          </form>
        </div>

        <div id="pie">Sistema de Login Y Registro</div>
      </div><!-- fin contenedor -->
    <!--
      </div>

      </body>

      </html> -->

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">


      <!-- Website CSS style -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- Website Font style -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
      <link rel="stylesheet" href="style.css">
      <!-- Google Fonts -->
      <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

      <title>Admin</title>
    </head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <body>
    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <h5>Registro de convenios de colaboración</h5>
          <form class="" method="post" action="actividad_convenio">
              @csrf-field()
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
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-gamepad fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="convenio" id="convenio"  placeholder="Ingrese el convenio"/>
                </div>
              </div>
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
                  <input type="file" class="form-control" name="evidencia" id="evidencia"  placeholder="Confirm your Password"/>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>

  </div>

@endsection
