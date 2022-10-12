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
                                        <option value="">SELECCIONE UN ORIGEN...</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->id}}">{{$area->area_nombre}} </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">OTRO ORIGEN</label>
                                <div class="input-group">
                                    <input id="otro_origen" name="otro_origen" class="form-control" type="text" value="{{old('numero_documento')}}" placeholder="Escriba un origen en caso de no encontrarlo en la lista." onkeyup="this.value = this.value.toUpperCase();" />
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">DESTINO</label>
                                <div class="input-group">
                                    <select class="form-control" name="destino" id="detino">
                                        <option value="">SELECCIONE UN DESTINO...</option>
                                        @foreach($areas as $area)
                                            <option value="{{$area->id}}">{{$area->area_nombre}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label mt-4">OTRO DESTINO</label>
                                    <div class="input-group">
                                        <input id="otro_destino" name="otro_destino" class="form-control" type="text" placeholder="Escriba un destino en caso de no encontrarlo en la lista." value="{{old('otro_destino')}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DE SERVICIO</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_tipo_servicio" id="id_tipo_servicio">
                                    @foreach($tiposervicios as $tiposervicio)
                                        <option value="{{$tiposervicio->id}}">{{$tiposervicio->nombre}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DE VEHÍCULO</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_tipo_vehiculo" id="id_tipo_vehiculo">
                                        @foreach($tipovehiculos as $tipovehiculo)
                                            <option value="{{$tipovehiculo->id}}">{{$tipovehiculo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">FECHA DE ENTREGA</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" id="fecha_entrega_solicita" name="fecha_entrega_solicita" autocomplete="off" placeholder="1979-04-16" value="{{old('fecha_nacimiento')}}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">HORA DE ENTREGA</label>
                                <input class="form-control" type="time" id="hora_entrega_solicita" name="hora_entrega_solicita" autocomplete="off" value="{{old('fecha_nacimiento')}}" />
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="col-md-6">
                                <label class="form-label mt-4">TRANSPORTE DE DINERO?</label>
                                <div class="input-group">
                                    <select class="form-control" name="efectivo_entrega" id="efectivo_entrega">

                                    </select>
                                </div>

                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">CUÁNTO?</label>
                                <div class="input-group">
                                    <input id="efectivo_monto" name="efectivo_monto" class="form-control" type="text"  onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <label class="form-label mt-4">ASIGNADO A:</label>
                                <div class="input-group">
                                    <select class="form-control" name="asignado_a" id="asignado_a">
                                        <option value="">Seleccione un mensajero...</option>
                                        @foreach($mensajeros as $mensajero)
                                            <option value="{{$mensajero->userid}}"> {{$mensajero->nombres.' '.$mensajero->apellidos}} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-6" hidden>
                                <label class="form-label mt-4">CUÁNTO?</label>
                                <div class="input-group">
                                    <input id="efectivo_monto" name="efectivo_monto" class="form-control" type="text"  onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="form-label mt-4">DESCRIPCIÓN DEL DOMICILIO:</label>
                            <div class="input-group">
                                <div class="form-control" id="notes" type="text">
                                    <textarea class="form-control-plaintext" id="descripcion" name="descripcion" type="text" placeholder="DESCRIBA BREVEMENTE EL DETALLE DEL SERVICIO REQUERIDO"></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-50">SOLICITAR DOMICILIO</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
@endsection
