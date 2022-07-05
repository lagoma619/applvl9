@extends('layout.app')
@section('title', 'CREAR USUARIO')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>

    <div class="container py-8">
        <form method="GET" ACTION="#fechanac">
            <div class="card">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>NOMBRES</label>
                            <input name="nombres" class="form-control" type="text" placeholder="Ej. CARLOS ANTONIO" onkeyup="this.value = this.value.toUpperCase();" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>APELLIDOS</label>
                            <input name="apellidos" class="form-control" type="text" placeholder="Ej. MOLINA QUIJANO" onkeyup="this.value = this.value.toUpperCase();" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>TIPO DOCUMENTO</label>
                            <input name="tipodoc" class="form-control" type="text" placeholder="SELECCIONE UN TIPO DE DOCUMENTO" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>NÚMERO DOCUMENTO</label>
                            <input name="numdoc" class=" form-control" type="number" placeholder="Ej. 1130789456" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>DIRECCIÓN</label>
                            <input name="direccion" class="form-control" type="text" placeholder="Ej. Avenida 6AN #45-54" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>CORREO ELECTRÓNICO</label>
                            <input name="email" class="form-control" type="email" placeholder="Ej. carlos.molina@hotmail.com" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>SEXO</label>
                            <input name="sexo" class="form-control" type="text" placeholder="Seleccione una opción" onkeyup="this.value = this.value.toUpperCase();" />
                        </div>

                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label for="date">FECHA DE NACIMIENTO</label>
                            <div class="input-group date" id="datepicker">
                                    <input class="form-control" placeholder="Seleccionar fecha" type="text" value="{{date('Y-m-d')}}"
                                           data-date-format="Y-mm-dd" name="fechanac">
                                <span class="input-group-append">
                                    </span>


                                </div>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>CONTRASEÑA</label>
                            <input class="form-control" type="password" placeholder="******" />
                        </div>


                    </div>

                    <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Crear usuario">Guardar</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

    </script>
        @endsection

    @section('scripts')



    @endsection
