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
            margin-top:70px;
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
            max-width: 600px;
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
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <div class="form-group" style="margin-top: 15px; font-size: 20px;">
                <label>Registro de actividad de extensión.</label>

            </div>
            <!--<div class="col-xl" >
                <h5>Registrar actividad de extensión:</h5>
            </div>
            <h5>Registro de actividad de extensión. </h5>-->
            <form class="" method="post" action="actividad_extension">
                @csrf-field()


                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Titulo</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Ingrese el titulo de la actividad"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Seleccione la actividad a registrar</label>
                    <select name="title" id="title" class="form-control">
                        <option value="Charla">Charla</option>
                        <option value="Curso">Curso</option>
                        <option value="Talleres">Talleres</option>
                        <option value="Seminario">Seminario</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputdate">Fecha en que se realizó</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Lugar</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>   -->
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Ingrese el lugar de la actividad"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Asistentes</label>
                    <div class="cols-sm-10">
                        <div class="input-group">

                            <input type="number" class="form-control" name="fecha" id="fecha"  placeholder="Ingrese la cantidad"/>
                        </div>
                    </div>



                   <!-- <div class="cols-sm-10">
                        <div class="input-group">

                             <input type="password" class="form-control" name="password" id="password"  placeholder="Ingrese la cantidad de asistentes"/>
                         </div>
                     </div>-->
                 </div>

                 <div class="form-group">
                     <label for="confirm" class="cols-sm-2 control-label">Organizador de la actividad</label>
                     <div class="cols-sm-10">
                         <div class="input-group">
                             <!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
                             <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Ingrese el nombre del organizador"/>
                         </div>
                     </div>
                 </div>

                <!--Subir pdf-->
                <div class="row">
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Subir lista de asistencia</label>
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


                <!--cargar cositos-->
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Adjuntar imagenes</label>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>Subir archivos</strong> <small> </small></div>
                            <div class="panel-body">
                                <div class="input-group image-preview">
                                    <input placeholder="" type="text" class="form-control image-preview-filename" disabled="disabled">
                                    <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
						<!-- image-preview-clear button -->
						<button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
                                        <!-- image-preview-input -->
						<div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/>
                            <!-- rename it -->
						</div>
						<button type="button" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
						</span> </div>
                                <!-- /input-group image-preview [TO HERE]-->

                                <br />

                                <!-- Drop Zone -->
                                <div class="upload-drop-zone" id="drop-zone"> Or drag and drop files here </div>
                                <br />
                                <!-- Progress Bar -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                                </div>
                                <br />

                            </div>
                        </div>
                    </div>



                </div>
                <!--FIN cargar cositos-->

                <div class="form-group ">
                    <button   id="button" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
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
