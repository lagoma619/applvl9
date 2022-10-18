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
                                    <input id="nombre" name="nombre" class="form-control" type="text" placeholder="PROVIDA FARMACEUTICA SAS" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">NOMBRE COMERCIAL</label>
                                <div class="input-group">
                                    <input id="nombre_comercial" name="nombre_comercial" class="form-control" type="text" placeholder="CLINICA ESENSA" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DOCUMENTO</label>
                                <div class="input-group">
                                    <select class="form-control" id="id_tipo_documento" name="id_tipo_documento">
                                        @foreach($tiposdocumentos as $tipodocumento)
                                            <option value="{{$tipodocumento->id}}">{{$tipodocumento->tipodocumento_nombre}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">NÚMERO DOCUMENTO</label>
                                <div class="input-group">
                                    <input id="numero_documento" name="numero_documento" class="form-control" type="text" placeholder="901402789-9"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">DIRECCIÓN</label>
                                <div class="input-group">
                                    <input id="direccion" name="direccion" class="form-control" type="text" placeholder="CARRERA 44 #9C-58" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">CIUDAD</label>
                                <div class="input-group">
                                    <input id="ciudad" name="ciudad" class="form-control" type="text" placeholder="CALI" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO</label>
                                <div class="input-group">
                                    <input id="telefono" name="telefono" class="form-control" type="text" placeholder="6023808010"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">CORREO ELECTRÓNICO</label>
                                <div class="input-group">
                                    <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com" />
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="contacto" name="contacto" class="form-control" type="text" placeholder="CAMILA CABELLO" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="telefono_contacto" name="telefono_contacto" class="form-control" type="number" placeholder="3117895623"/>
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
                                        <input class="form-control" type="time" name="horario_inicio" id="horario_inicio" value="" />
                                    </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label mt-4">HORA FINAL</label>
                                        <div class="input-group">
                                            <input class="form-control" type="time" name="horario_fin" id="horario_fin" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label mt-4">INICIO DE CONTRATO</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" type="date"  name="inicio_contrato" placeholder="2018-04-16" />
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <label class="form-label mt-4">SITIO WEB</label>
                                <input id="pagina_web" name="pagina_web" class="form-control" type="text" placeholder="www.clinicaesensa.com" onkeyup="this.value = this.value.toUpperCase();">
                            </div>

                        <div class="col-md-6">
                            <label class="form-label mt-4">ESTADO CLIENTE</label>
                            <div class="input-group">
                                <select class="form-control" name="id_estado" id="id_estado">
                                    @foreach($usuarioestados as $usuarioestado)
                                        <option value="{{$usuarioestado->id}}" @if($usuarioestado->id==3 or $usuarioestado->id==4)hidden @endif>{{$usuarioestado->usuestado_nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        </div>
                        <div class="row">

                            <label class="form-label mt-4">NOTAS</label>
                            <div class="input-group">
                                <div class="form-control" id="notes" type="text">
                                    <textarea class="form-control-plaintext" id="notas" name="notas" type="text" placeholder="ESCRIBA AQUÍ LAS NOTAS RELACIONADAS AL CLIENTE"></textarea>
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
