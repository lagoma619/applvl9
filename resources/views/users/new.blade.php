@extends('layouts.app')
@section('title','CREAR USUARIO')
@section('scripts')
    <!-- SELECTOR DE FECHA -->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/vendor/datepicker/css/bootstrap-datepicker3.css')}}">
    <script src="{{asset('assets/vendor/datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    <script>
        $('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            language: "es",
            autoclose: true
        });
    </script>

@endsection

@section('content')

    <div class="container-fluid my-5 py-2">
        <div class="row mb-5">
            @if($errors->any())
                <div class="alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="col" >
                    <a href="{{url('/users/')}}" class="btn btn-sm btn-success">CANCELAR</a>
                </div>
    <!-- Card Basic Info -->
            <form action="{{url('usuarios')}}" method="POST">

                @csrf
    <div class="card mt-4" id="basic-info">

        <div class="card-body">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <h5>DATOS DEL USUARIO</h5>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-check-label mb-0">
                        <label id="activo">
                            ACTIVO
                        </label>
                    </label>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" name="estado" id="checkActivo" checked onchange="visible()"/>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <div class="card-body pt-0">
            <div class="row">
                <div class="col-6">
                    <label class="form-label">NOMBRES</label>
                    <div class="input-group">
                        <input id="nombres" name="nombres" class="form-control" type="text" placeholder="CARLOS ANTONIO" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label">APELLIDOS</label>
                    <div class="input-group">
                        <input id="apellidos" name="apellidos" class="form-control" type="text" placeholder="GALLEGO FERMÍN" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">TIPO DOCUMENTO</label>
                    <div class="input-group">
                        <select class="form-control" name="tipo_documento">
                            <option value="cc">CEDULA DE CIUDADANÍA</option>
                            <option value="ce">CEDULA DE EXTRANJERÍA</option>
                            <option value="nit">NÚMERO DE IDENTIFICACIÓN TRIBUTARIA - NIT</option>

                        </select>

                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">NÚMERO DOCUMENTO</label>
                    <div class="input-group">
                        <input id="idpersona" name="idpersona" class="form-control" type="number" placeholder="1130897654"/>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label class="form-label mt-4">DIRECCIÓN</label>
                    <div class="input-group">
                        <input id="direccion" name="direccion" class="form-control" type="text" placeholder="CALLE 3 OESTE #23-45" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="form-label mt-4">CORREO ELECTRÓNICO</label>
                        <div class="input-group">
                            <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com" />
                        </div>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">TELÉFONO 1</label>
                    <div class="input-group">
                        <input id="cel_personal" name="cel_personal" class="form-control" type="number" placeholder="3158963569"/>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">TELÉFONO 2</label>
                    <div class="input-group">
                        <input id="cel_corporativo" name="cel_corporativo" class="form-control" type="number" placeholder="3117895623"/>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label class="form-label mt-4">FECHA DE NACIMIENTO</label>
                    <div class="input-group">
                        <input class="form-control datepicker" type="text"  name="fecha_nacimiento" placeholder="1979-04-16" />
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">SEXO</label>
                    <select class="form-control" name="choices-gender" id="sexo" name="sexo">
                        <option value="Masculino">MASCULINO</option>
                        <option value="Femenino">FEMENINO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label mt-4">TIPO DE USUARIO</label>
                    <div class="input-group">
                        <select class="form-control" name="tipo_cuenta" id="tipo_cuenta">
                            <option value="MENSAJERO">MENSAJERO</option>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="AUXILIAR">AUXILIAR ADMIN</option>
                            <option value="CLIENTE">CLIENTE</option>
                        </select>
                    </div>

                </div>
                <div class="col-6">
                    <label class="form-label mt-4">CIUDAD</label>
                    <div class="input-group">
                        <input id="location" name="ciudad" class="form-control" type="text" placeholder="TULUÁ" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4"><mark>CONTRASEÑA</mark></label>
                    <input class="form-control" id="contrasena" type="contrasena" placeholder="******" />
                </div>
            </div>
            <div class="row">

                <label class="form-label mt-4">NOTAS</label>
                <div class="input-group">
                <div class="form-control" id="notes" type="text">
                    <textarea class="form-control-plaintext" id="nota" name="nota" type="text" placeholder="ESCRIBA AQUÍ LAS NOTAS RELACIONADAS AL USUARIO"></textarea>
                </div>
                </div>
            </div>

            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg w-50">GUARDAR</button>
            </div>
        </div>

            </form>
@endsection
