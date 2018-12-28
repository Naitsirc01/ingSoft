@extends('layout.mainlayout')
@section('content')
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
    <style>
        .spinner input {
            text-align: right;
        }

        .input-group-btn-vertical {
            position: relative;
            white-space: nowrap;
            width: 2%;
            vertical-align: middle;
            display: table-cell;
        }

        .input-group-btn-vertical > .btn {
            display: block;
            float: none;
            width: 100%;
            max-width: 100%;
            padding: 8px;
            margin-left: -1px;
            position: relative;
            border-radius: 0;
        }

        .input-group-btn-vertical > .btn:first-child {
            border-top-right-radius: 4px;
        }

        .input-group-btn-vertical > .btn:last-child {
            margin-top: -2px;
            border-bottom-right-radius: 4px;
        }

        .input-group-btn-vertical i {
            position: absolute;
            top: 0;
            left: 4px;
        }



        <!--subir pdf-->
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 100%;
        }
        <!--Fin subir pdf-->
        #playground-container {
            height: 500px;
            overflow: hidden !important;
            -webkit-overflow-scrolling: touch;
        }
        body, html{
            margin-top:0px;
            height: 100%;
            background-repeat: no-repeat;
            background-color: #ffffff;

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
            max-width: 600px;
            padding: 10px 40px;
            background: #23415b;
            color: #FFF;
            text-shadow: none;
            -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
            -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
            box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);


        }
        span.input-group-addon i {
            color: #23415b;
            font-size: 17px;
        }

        .login-button{
            margin-top: 5px;
        }

        .login-register{
            font-size: 11px;
            text-align: center;
        }

        /* layout.css Style Cosito de subir Fotos*/
        .upload-drop-zone {
            height: 200px;
            border-width: 2px;
            margin-bottom: 20px;
        }

        /* skin.css Style*/
        .upload-drop-zone {
            color: #ccc;
            border-style: dashed;
            border-color: #ccc;
            line-height: 200px;
            text-align: center
        }
        .upload-drop-zone.drop {
            color: #222;
            border-color: #222;
        }



        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }

    </style>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <div class="form-group" style="margin-top: 15px; font-size: 20px;">
                <label>Registrar actividad de titulación por convenio.</label>

            </div>

            <form class="" method="post" action="#">

                <div class="form-group">

                    <label for="name" class="cols-sm-2 control-label">Titulo</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Ingrese el titulo de la actividad"/>
                        </div>
                    </div>

                    <label for="email" class="cols-sm-2 control-label">Nombre</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese el nombre del estudiante"/>
                        </div>
                    </div>

                    <label for="email" class="cols-sm-2 control-label">Rut</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese el rut del estudiante"/>
                        </div>
                    </div>

                    <label for="name" class="cols-sm-2 control-label">Seleccione la Carrera</label>
                    <select class="form-control" id="Registrar" placeholder="Registrar cositos">
                        <option>ICCI</option>
                        <option>ICI</option>
                        <option>ICA</option>
                        <option>ICdM</option>
                        <option>ICM</option>
                        <option>ICPC</option>
                        <option>ICQ</option>
                        <option>IC</option>
                    </select>

                    <label for="exampleInputdate">Fecha de inicio</label>
                    <input type="date" class="form-control" id="date" name="date">

                    <label for="exampleInputdate">Fecha de termino</label>
                    <input type="date" class="form-control" id="date" name="date">

                    <label for="email" class="cols-sm-2 control-label">Nombre profesor guia</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese el nombre del profesor"/>
                        </div>
                    </div>

                    <label for="email" class="cols-sm-2 control-label">Nombre empresa</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese el nombre de la empresa donde se realiza"/>
                        </div>
                    </div>


                 </div>

                <!--Subir pdf-->
                <div class="row">
                    <div class="col-md-10" >
                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Subir formulario de inscripcion</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse… <input type="file" accept="image/png, image/jpeg, image/gif" id="imgInp">
                                    </span>
                                </span>
                                <input id='urlname'type="text" class="form-control" readonly>
                            </div>
                            <button id="clear" class="btn btn-default">Clear</button>
                            <img id='img-upload'/>
                        </div>
                    </div>
                </div>
                <!--FIN Subir pdf-->



                     <a href="https://deepak646.blogspot.com/" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Registrar</a>
                     <a href="https://deepak646.blogspot.com/" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Cancelar</a>


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
@endsection