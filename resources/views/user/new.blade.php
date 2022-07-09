@extends('layouts.app')
@section('title','CREAR USUARIO')
@section('scripts')
    <!-- SELECTOR DE FECHA -->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/datepicker/css/bootstrap-datepicker3.css')}}">
    <script src="{{asset('assets/vendor/bootstrap/datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
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

    <!-- Card Basic Info -->
    <div class="card mt-4" id="basic-info">
        <div class="card-header">
            <h5>DATOS DEL USUARIO</h5>
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-6">
                    <label class="form-label">NOMBRES</label>
                    <div class="input-group">
                        <input id="name" name="name" class="form-control" type="text" placeholder="CARLOS ANTONIO" required="required" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label">APELLIDOS</label>
                    <div class="input-group">
                        <input id="lastname" name="lastname" class="form-control" type="text" placeholder="GALLEGO FERMÍN" required="required" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">TIPO DOCUMENTO</label>
                    <div class="input-group">
                        <select class="form-control">
                            <option value="cc">CEDULA DE CIUDADANÍA</option>
                            <option value="ce">CEDULA DE EXTRANJERÍA</option>
                            <option value="nit">NÚMERO DE IDENTIFICACIÓN TRIBUTARIA - NIT</option>

                        </select>

                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">NÚMERO DOCUMENTO</label>
                    <div class="input-group">
                        <input id="numdocumento" name="numdocumento" class="form-control" type="number" placeholder="1130897654">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">SEXO</label>
                    <select class="form-control" name="choices-gender" id="choices-gender">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="form-label mt-4">FECHA DE NACIMIENTO</label>
                        <div class="input-group">
                        <input class="form-control datepicker" type="text"  name="date" placeholder="1979-04-16">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">CORREO ELECTRÓNICO</label>
                    <div class="input-group">
                        <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">DIRECCIÓN</label>
                    <div class="input-group">
                        <input id="confirmation" name="confirmation" class="form-control" type="email" placeholder="CALLE 3 OESTE #23-45" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">CIUDAD</label>
                    <div class="input-group">
                        <input id="location" name="city" class="form-control" type="text" placeholder="TULUÁ" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">NÚMERO TEL</label>
                    <div class="input-group">
                        <input id="phone" name="phone" class="form-control" type="number" placeholder="3117895623">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <label class="form-label mt-4">FECHA DE CONTRATACIÓN</label>
                        <div class="input-group">
                            <input class="form-control datepicker" type="text"  name="fechacontrato" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-4">CONTRASEÑA</label>
                    <input class="form-control" id="contrasena" type="password" placeholder="******" />
                </div>
            </div>
        </div>
    </div>

@endsection
