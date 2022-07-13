@extends('layouts.app')
@section('title','CREAR CLIENTE')
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

        $('#hora').datepicker({
            format: "",
            language: "es",
            autoclose: true
        });
    </script>



@endsection

@section('content')

    <div class="container-fluid my-5 py-2">
        <div class="row mb-5">

            <!-- Card Basic Info -->
            <form action="" method="POST">
                <div class="card mt-4" id="basic-info">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>DATOS DEL CLIENTE</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-check-label mb-0">
                                        <label id="activo">
                                            ACTIVO
                                        </label>
                                    </label>
                                    <div class="form-check form-switch ms-2">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">NOMBRE</label>
                                <div class="input-group">
                                    <input id="name" name="name" class="form-control" type="text" placeholder="PROVIDA FARMACEUTICA SAS" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">NOMBRE COMERCIAL</label>
                                <div class="input-group">
                                    <input id="lastname" name="lastname" class="form-control" type="text" placeholder="CLINICA ESENSA" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
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
                                    <input id="numdocumento" name="numdocumento" class="form-control" type="number" placeholder="901402789-9"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO</label>
                                <div class="input-group">
                                    <input id="numdocumento" name="numdocumento" class="form-control" type="number" placeholder="6023808010"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label mt-4">INICIO DE CONTRATO</label>
                                    <div class="input-group">
                                        <input class="form-control datepicker" type="text"  name="date" placeholder="1979-04-16" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">CORREO ELECTRÓNICO</label>
                                <div class="input-group">
                                    <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com" />
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">DIRECCIÓN</label>
                                <div class="input-group">
                                    <input id="confirmation" name="confirmation" class="form-control" type="email" placeholder="CARRERA 44 #9C-58" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">CIUDAD</label>
                                <div class="input-group">
                                    <input id="location" name="city" class="form-control" type="text" placeholder="CALI" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="phone" name="phone" class="form-control" type="number" placeholder="3117895623"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="location" name="city" class="form-control" type="text" placeholder="CALI" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="phone" name="phone" class="form-control" type="number" placeholder="3117895623"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col">
                                    <label class="form-label mt-4">HORA INICIO</label>
                                    <div class="input-group">
                                        <input class="form-control" type="time" name="hora" id="hora" value="" />
                                    </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label mt-4">HORA FINAL</label>
                                        <div class="input-group">
                                            <input class="form-control" type="time" name="hora" id="hora" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mt-4">CONTRASEÑA</label>
                                <input class="form-control" id="contrasena" type="password" placeholder="******" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label mt-4">TIPO DE USUARIO</label>
                                    <div class="input-group">
                                        <input id="location" name="city" class="form-control" type="text" placeholder="MENSAJERO" onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mt-4">SITIO WEB</label>
                                <input id="location" name="web" class="form-control" type="text" placeholder="www.clinicaesensa.com" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="row">

                            <label class="form-label mt-4">NOTAS</label>
                            <div class="input-group">
                                <div class="form-control" id="notes" type="text">
                                    <textarea class="form-control-plaintext" id="notes" type="text" placeholder="ESCRIBA AQUÍ LAS NOTAS RELACIONADAS AL CLIENTE"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-6">
                            <button type="submit" class="btn btn-primary btn-lg w-80">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </form>
@endsection
