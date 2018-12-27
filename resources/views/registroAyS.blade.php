@extends('layout.formlayout')
@section('content')

    <div class="container">
        <div class="row main">
            <div class="main-login main-center">
                <h5>Registro de actividad de Aprendizaje + Servicio</h5>
                <form class="" method="post" action="actividad_a+s">
                    @csrf-field()

                    <div class="form-group">
                        <label for="profesor" class="cols-sm-2 control-label">Nombre profesor</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="profesor" id="profesor"  placeholder="Ingrese profesor"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cestudiantes" class="cols-sm-2 control-label">Cantidad estudiantes</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="cestudiantes" id="cestudiantes"  placeholder="Ingrese cantidad de estudiantes"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sociocomunitario" class="cols-sm-2 control-label">Nombre socio comunitario</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="sociocomunitario" id="sociocomunitario"  placeholder="Ingrese nombre socio comunitario"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="semestreaño" class="cols-sm-2 control-label">Semestre/año</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
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
                        <button  id="button" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
