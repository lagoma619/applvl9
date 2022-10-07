@extends('layouts.app')
@section('title','SOLICITAR DOMICILIO')
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
            <div class="col" hidden>
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
                                        <h5>DATOS DEL DOMICILIO</h5>
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
                                <label class="form-label">QUIÉN SOLICITA?</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_userid" id="id_userid">
                                        @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->userid}}" @selected(old('', $usuario->userid) == auth()->id())> {{$usuario->nombres.' '.$usuario->apellidos}} </option>
                                        @endforeach
                                    </select>
                                    <!-- <input id="ususolicita" name="ususolicita" disabled class="form-control" type="text" required="required" value="{{old('',$usuario->nombres.' '.$usuario->apellidos)}}" onkeyup="this.value = this.value.toUpperCase();"/> -->
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">TIPO VEHÍCULO</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_tipovehiculo" id="id_tipovehiculo">
                                        @foreach($tipovehiculos as $tipovehiculo)
                                            <option value="{{$tipovehiculo->id}}">{{$tipovehiculo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">ORIGEN</label>
                                <div class="input-group">
                                    <select class="form-control" name="origen" id="origen">
                                        @foreach($clientes as $cliente)
                                            @foreach($sedes as $sede)
                                                <option value="{{$sede}}">{{$sede}} </option>
                                            @endforeach

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">OTRO ORIGEN</label>
                                <div class="input-group">
                                    <input id="numero_documento" name="numero_documento" class="form-control" type="text" required="required" value="{{old('numero_documento')}}" placeholder="1130897654" />
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">DESTINO</label>
                                <div class="input-group">
                                    <input id="direccion" name="direccion" class="form-control" type="text" placeholder="CALLE 3 OESTE #23-45" value="{{old('direccion')}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label mt-4">OTRO DESTINO</label>
                                    <div class="input-group">
                                        <input id="email" name="email" class="form-control" type="email" required="required" placeholder="example@email.com" value="{{old('email')}}" />
                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DE SERVICIO</label>
                                <div class="input-group">
                                    <input id="cel_personal" name="cel_personal" class="form-control" type="text" required="required" placeholder="3158963569" value="{{old('cel_personal')}}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DE VEHÍCULO</label>
                                <div class="input-group">
                                    <input id="cel_corporativo" name="cel_corporativo" class="form-control" type="text" placeholder="3117895623" value="{{old('cel_corporativo')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">FECHA DE ENTREGA</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" id="fecha_nacimiento" name="fecha_nacimiento" autocomplete="off" placeholder="1979-04-16" value="{{old('fecha_nacimiento')}}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">HORA DE ENTREGA</label>
                                <select class="form-control" id="sexo" name="sexo">
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMENINO">FEMENINO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label mt-4">TRANSPORTE DE DINERO?</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_tipos_usuario" id="id_tipos_usuario">

                                    </select>
                                </div>

                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">CUÁNTO?</label>
                                <div class="input-group">
                                    <input id="location" name="ciudad" class="form-control" type="text" required="required" placeholder="TULUÁ" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="form-label mt-4">DESCRIPCIÓN DEL DOMICILIO:</label>
                            <div class="input-group">
                                <div class="form-control" id="notes" type="text">
                                    <textarea class="form-control-plaintext" id="notapersona" name="notapersona" type="text" placeholder="DESCRIBA BREVEMENTE EL DETALLE DEL SERVICIO REQUERIDO"></textarea>
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
