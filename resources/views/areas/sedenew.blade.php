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
                                        <h5>DATOS DE SEDE</h5>
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
                                <label class="form-label">NOMBRE SEDE</label>
                                <div class="input-group">
                                    <input id="name" name="name" class="form-control" type="text" placeholder="CONTRIBUTIVO TEQUENDAMA" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">CLIENTE</label>
                                <div class="input-group">
                                    <input id="lastname" name="lastname" class="form-control" type="text" placeholder="LISTA CLIENTES" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">DIRECCIÓN SEDE</label>
                                <div class="input-group">
                                    <input class="form-control" name="direccion" type="text" placeholder="CARRERA 44 #2C-64" required="required" onkeyup="this.value.toUpperCase();" />

                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="numdocumento" name="numdocumento" class="form-control" type="number" placeholder="3157894562"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="numdocumento" name="numdocumento" class="form-control" type="text" placeholder="JOHN DANNY MUÑOZ"required="required" onkeyup="this.value.toUpperCase();" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label mt-4">ORIGEN-DESTINO RECURRENTE </label>
                                    <div class="input-group">
                                        <input id="numdocumento" name="numdocumento" class="form-control" type="text" placeholder="LISTA DESTINOS RECURRENTE"required="required" onkeyup="this.value.toUpperCase();" />
                                    </div>
                                </div>
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
