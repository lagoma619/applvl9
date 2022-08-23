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
            @if(session('notification'))
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <strong>{{session('notification')}}</strong>
                    </div>
                </div>
            @endif
                <div class="col" >
                    <a href="{{url('/users/')}}" class="btn btn-sm btn-success">CANCELAR</a>
                </div>
    <!-- Card Basic Info -->
            <form action="{{url('users')}}" method="POST">

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
                </div>
            </div>
        </div>

        </div>

        <div class="card-body pt-0">
            <div class="row">
                <div class="col-6">
                    <label class="form-label">NOMBRES</label>
                    <div class="input-group">
                        <input id="nombres" name="nombres" class="form-control" type="text" placeholder="CARLOS ANTONIO" required="required" value="{{old('nombres')}}" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label">APELLIDOS</label>
                    <div class="input-group">
                        <input id="apellidos" name="apellidos" class="form-control" type="text" placeholder="GALLEGO FERMÍN" required="required" value="{{old('apellidos')}}" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">TIPO DOCUMENTO</label>
                    <div class="input-group">
                        <select class="form-control" name="id_tipo_documento" id="id_tipo_documento">
                        @foreach($tiposdocumentos as $tipodocumento)
                            <option value="{{$tipodocumento->id}}">{{$tipodocumento->tipodocumento_nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">NÚMERO DOCUMENTO</label>
                    <div class="input-group">
                        <input id="numero_documento" name="numero_documento" class="form-control" type="text" required="required" value="{{old('numero_documento')}}" placeholder="1130897654" />
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label class="form-label mt-4">DIRECCIÓN</label>
                    <div class="input-group">
                        <input id="direccion" name="direccion" class="form-control" type="text" placeholder="CALLE 3 OESTE #23-45" value="{{old('direccion')}}" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="form-label mt-4">CORREO ELECTRÓNICO</label>
                        <div class="input-group">
                            <input id="email" name="email" class="form-control" type="email" required="required" placeholder="example@email.com" value="{{old('email')}}" />
                        </div>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4">TELÉFONO PERSONAL</label>
                    <div class="input-group">
                        <input id="cel_personal" name="cel_personal" class="form-control" type="text" required="required" placeholder="3158963569" value="{{old('cel_personal')}}"/>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">TELÉFONO CORPORATIVO</label>
                    <div class="input-group">
                        <input id="cel_corporativo" name="cel_corporativo" class="form-control" type="text" placeholder="3117895623" value="{{old('cel_corporativo')}}"/>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label class="form-label mt-4">FECHA DE NACIMIENTO</label>
                    <div class="input-group">
                        <input class="form-control datepicker" id="fecha_nacimiento" name="fecha_nacimiento" autocomplete="off" placeholder="1979-04-16" value="{{old('fecha_nacimiento')}}" />
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-4">SEXO</label>
                    <select class="form-control" id="sexo" name="sexo">
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label mt-4">TIPO DE USUARIO</label>
                    <div class="input-group">
                        <select class="form-control" name="id_tipos_usuario" id="id_tipos_usuario">
                            @foreach($tiposusuarios as $tipousuario)
                                <option value="{{$tipousuario->id}}">{{$tipousuario->tipousu_nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-6">
                    <label class="form-label mt-4">CIUDAD</label>
                    <div class="input-group">
                        <input id="location" name="ciudad" class="form-control" type="text" required="required" placeholder="TULUÁ" onkeyup="this.value = this.value.toUpperCase();"/>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label mt-4"><mark>CONTRASEÑA</mark></label>
                    <input class="form-control" id="password" name="password" type="text" placeholder="******" required="required" />
                </div>

            <div class="col-md-6">
                <label class="form-label mt-4">ESTADO USUARIO</label>
                <div class="input-group">
                    <select class="form-control" name="id_usuestado" id="id_usuestado">
                        @foreach($usuarioestados as $usuarioestado)
                            <option value="{{$usuarioestado->id}}">{{$usuarioestado->usuestado_nombre}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            </div>
            <div class="row">

                <label class="form-label mt-4">NOTAS</label>
                <div class="input-group">
                    <div class="form-control" id="notes" type="text">
                        <textarea class="form-control-plaintext" id="notapersona" name="notapersona" type="text" placeholder="ESCRIBA AQUÍ LAS NOTAS RELACIONADAS AL USUARIO"></textarea>
                    </div>
                </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg w-50">GUARDAR</button>
            </div>
        </div>
        </div>
    </div>
            </form>
@endsection
