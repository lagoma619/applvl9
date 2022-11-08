@extends('layouts.app')
@section('title','CREAR CLIENTE')
@section('scripts')

    <script src=
                "https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>
    <script src=
                "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    </script>

    <script type="text/javascript" src=
        "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
    </script>
    <link
        href=
            "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet">

    <script src=
                "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
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



            // Below code sets format to the
            // datetimepicker having id as
            // datetime
            $('#datetime').datetime({
            format: 'hh:mm:ss a'
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
            @if(session('notification'))
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <strong>{{session('notification')}}</strong>
                    </div>
                </div>
            @endif

            <div class="col" >
                <a href="{{url('/clients/')}}" class="btn btn-sm btn-success">CANCELAR</a>
            </div>
            <!-- Card Basic Info -->
            <form action="{{url('clients')}}" method="POST">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>DATOS DEL CLIENTE</h5>
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
                                    <input id="cliente_nombre" name="cliente_nombre" {{old('cliente_nombre')}} class="form-control" type="text" placeholder="CLIENTE SAS" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">NOMBRE COMERCIAL</label>
                                <div class="input-group">
                                    <input id="cliente_nombre_comercial" name="cliente_nombre_comercial" {{old('cliente_nombre_comercial')}} class="form-control" type="text" placeholder="CLIENTE DEL VALLE SAS" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DOCUMENTO</label>
                                <div class="input-group">
                                    <select class="form-control" id="cliente_id_tipo_documento" name="cliente_id_tipo_documento">
                                        @foreach($tiposdocumentos as $tipodocumento)
                                            <option value="{{$tipodocumento->tipodocumento_id}}">{{$tipodocumento->tipodocumento_nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">NÚMERO DOCUMENTO</label>
                                <div class="input-group">
                                    <input id="cliente_numero_documento" name="cliente_numero_documento" {{old('cliente_numero_documento')}} class="form-control" type="text" placeholder="901402789-9"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">DIRECCIÓN</label>
                                <div class="input-group">
                                    <input id="cliente_direccion" name="cliente_direccion" class="form-control" {{old('cliente_direccion')}} type="text" placeholder="CARRERA 1 CALLE 2" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">CIUDAD</label>
                                <div class="input-group">
                                    <input id="cliente_ciudad" name="cliente_ciudad" class="form-control" {{old('cliente_ciudad')}} type="text" placeholder="CALI" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO</label>
                                <div class="input-group">
                                    <input id="cliente_telefono" name="cliente_telefono" {{old('cliente_telefono')}} class="form-control" type="text" placeholder="6023808010"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">CORREO ELECTRÓNICO</label>
                                <div class="input-group">
                                    <input id="cliente_email" name="cliente_email" {{old('cliente_email')}} class="form-control" type="email" placeholder="example@email.com" />
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="cliente_contacto" name="cliente_contacto" {{old('cliente_contacto')}} class="form-control" type="text" placeholder="CAMILA CABELLO" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="cliente_telefono_contacto" name="cliente_telefono_contacto" {{old('cliente_telefono_contacto')}} class="form-control" type="number" placeholder="3117895623"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                        </div>
                        <div class="col-6">
                            <div class="row">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col">
                                    <label class="form-label mt-4">HORA INICIO</label>
                                    <div class="input-group">
                                        <input class="form-control" type="time" name="cliente_horario_inicio" {{old('cliente_horario_inicio')}} id="cliente_horario_inicio" value="" />
                                    </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label mt-4">HORA FINAL</label>
                                        <div class="input-group">
                                            <input class="form-control" type="time" name="cliente_horario_fin" {{old('cliente_horario_fin')}} id="cliente_horario_fin" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mt-4">INICIO DE CONTRATO</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" type="date"  name="cliente_inicio_contrato" {{old('cliente_inicio_contrato')}} placeholder="2018-04-16" />
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <label class="form-label mt-4">SITIO WEB</label>
                                <input id="cliente_pagina_web" name="cliente_pagina_web" {{old('cliente_pagina_web')}} class="form-control" type="text" placeholder="www.clinicaesensa.com" onkeyup="this.value = this.value.toUpperCase();">
                            </div>

                        <div class="col-md-6">
                            <label class="form-label mt-4">ESTADO CLIENTE</label>
                            <div class="input-group">
                                <select class="form-control" name="cliente_id_estado" id="cliente_id_estado">
                                    @foreach($usuarioestados as $usuarioestado)
                                        <option value="{{$usuarioestado->usuestado_id}}" @if($usuarioestado->usuestado_id==3 or $usuarioestado->usuestado_id==4)hidden @endif>{{$usuarioestado->usuestado_nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        </div>
                        <div class="row">

                            <label class="form-label mt-4">NOTAS</label>
                            <div class="input-group">
                                <div class="form-control" id="notes" type="text">
                                    <textarea class="form-control-plaintext" id="cliente_notas" name="cliente_notas" type="text" placeholder="ESCRIBA AQUÍ LAS NOTAS RELACIONADAS AL CLIENTE">{{old('cliente_notas')}}</textarea>
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
