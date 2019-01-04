@extends('layout.formlayout')
@section('content')


    <div class="container">
        <div class="row main">
            <div class="main-login main-center">
                <h5>Registro de Titulados</h5>
                <form class="" method="post" action="registro_titulados">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="titulado" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="titulado" id="titulado"  placeholder="Ingrese nombre del titulado"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rut" class="cols-sm-2 control-label">Rut</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="rut" id="rut"  placeholder="Ingrese rut del titulado"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="cols-sm-2 control-label">Telefono de contacto</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="telefono" id="telefono"  placeholder="Ingrese telefono de contacto"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Correo electronico</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese email de contacto"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="empresa" class="cols-sm-2 control-label">Nombre de la empresa de trabajo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="empresa" id="empresa"  placeholder="Ingrese el nombre de empresa"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="añoTitulacion" class="cols-sm-2 control-label">Año titulacion</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                                <input type="date" class="form-control" name="añoTitulacion" id="añoTitulacion"  placeholder="Ingrese año de titulacion"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="carrera" class="cols-sm-2 control-label">Carrera</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="carrera" id="carrera"  placeholder="Ingrese el nombre"/>
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
