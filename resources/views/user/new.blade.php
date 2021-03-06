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

    <!-- Card Basic Info -->
            <form action="" method="POST">
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
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()"/>
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
                        <input id="name" name="name" class="form-control" type="text" placeholder="CARLOS ANTONIO" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label">APELLIDOS</label>
                    <div class="input-group">
                        <input id="lastname" name="lastname" class="form-control" type="text" placeholder="GALLEGO FERM??N" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">TIPO DOCUMENTO</label>
                    <div class="input-group">
                        <select class="form-control">
                            <option value="cc">CEDULA DE CIUDADAN??A</option>
                            <option value="ce">CEDULA DE EXTRANJER??A</option>
                            <option value="nit">N??MERO DE IDENTIFICACI??N TRIBUTARIA - NIT</option>

                        </select>

                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">N??MERO DOCUMENTO</label>
                    <div class="input-group">
                        <input id="numdocumento" name="numdocumento" class="form-control" type="number" placeholder="1130897654"/>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label class="form-label mt-4">DIRECCI??N</label>
                    <div class="input-group">
                        <input id="confirmation" name="confirmation" class="form-control" type="email" placeholder="CALLE 3 OESTE #23-45" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="form-label mt-4">CORREO ELECTR??NICO</label>
                        <div class="input-group">
                            <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com" />
                        </div>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">TEL??FONO 1</label>
                    <div class="input-group">
                        <input id="location" name="city" class="form-control" type="number" placeholder="3158963569"/>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">TEL??FONO 2</label>
                    <div class="input-group">
                        <input id="phone" name="phone" class="form-control" type="number" placeholder="3117895623"/>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label class="form-label mt-4">FECHA DE NACIMIENTO</label>
                    <div class="input-group">
                        <input class="form-control datepicker" type="text"  name="date" placeholder="1979-04-16" />
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">SEXO</label>
                    <select class="form-control" name="choices-gender" id="choices-gender">
                        <option value="Masculino">MASCULINO</option>
                        <option value="Femenino">FEMENINO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label mt-4">TIPO DE USUARIO</label>
                    <div class="input-group">
                        <select class="form-control" name="gender" id="gender">
                            <option value="MENSAJERO">MENSAJERO</option>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="AUXILIAR">AUXILIAR ADMIN</option>
                            <option value="CLIENTE">CLIENTE</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">CIUDAD</label>
                    <div class="input-group">
                        <input id="location" name="city" class="form-control" type="text" placeholder="TULU??" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">N??MERO TEL</label>
                    <div class="input-group">
                        <input id="phone" name="phone" class="form-control" type="number" placeholder="3117895623"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4"><mark>CONTRASE??A</mark></label>
                    <input class="form-control" id="password" type="password" placeholder="******" />
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-4"><mark>REPETIR CONTRASE??A</mark></label>
                    <input class="form-control" id="password2" type="password" placeholder="******" />
                </div>
            </div>

            <div class="row">

                <label class="form-label mt-4">NOTAS</label>
                <div class="input-group">
                <div class="form-control" id="notes" type="text">
                    <textarea class="form-control-plaintext" id="notes" type="text" placeholder="ESCRIBA AQU?? LAS NOTAS RELACIONADAS AL USUARIO"></textarea>
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
