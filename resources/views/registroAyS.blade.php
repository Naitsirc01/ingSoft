@extends('layout.mainlayout')
@section('content')

    <Div>
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
                    <h5>Registro de actividad de Aprendizaje + Servicio</h5>
                    <form class="" method="post" action="#">

                        <div class="form-group">
                            <label for="asignatura" class="cols-sm-2 control-label">Nombre asignatura</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="asignatura" id="asignatura"  placeholder="Ingrese asignatura"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profesor" class="cols-sm-2 control-label">Nombre profesor</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-gamepad fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="profesor" id="profesor"  placeholder="Ingrese profesor"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cestudiantes" class="cols-sm-2 control-label">Cantidad estudiantes</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-gamepad fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="cestudiantes" id="cestudiantes"  placeholder="Ingrese cantidad de estudiantes"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sociocomunitario" class="cols-sm-2 control-label">Nombre socio comunitario</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-gamepad fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="sociocomunitario" id="sociocomunitario"  placeholder="Ingrese nombre socio comunitario"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="semestreaño" class="cols-sm-2 control-label">Semestre/año</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-gamepad fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="semestreaño" id="semestreaño"  placeholder="Ingrese semestre y año"/>
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
                            <a href="https://deepak646.blogspot.com/" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</a>
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
    </Div>
@endsection