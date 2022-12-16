@extends('layouts.app')
@section('title','SOLICITAR DOMICILIO')
@section('scripts')
    <!-- SELECTOR DE FECHA -->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/vendor/datepicker/css/bootstrap-datepicker3.css')}}">
    <script src="{{asset('assets/vendor/datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    <script src="{{asset('assets/js/areaxcliente.js')}}"></script>
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
                <a href="{{url('/domicilios/')}}" class="btn btn-sm btn-success">CANCELAR</a>
            </div>
            <!-- Card Basic Info -->
            <form action="{{url('domicilios')}}" method="POST">
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
                        <div class="row" @if(auth()->user()->id_tipos_usuario == 2) hidden @endif>
                            <div class="col-6">
                                <label class="form-label">QUIÉN SOLICITA?</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_id_userid" id="domicilio_id_userid">
                                        @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->userid}}" @selected(old('', $usuario->userid) == auth()->id())> {{$usuario->persona_nombres.' '.$usuario->persona_apellidos}} </option>
                                        @endforeach
                                    </select>
                                    <!-- <input id="ususolicita" name="ususolicita" disabled class="form-control" type="text" required="required" value="{{old('',$usuario->nombres.' '.$usuario->apellidos)}}" onkeyup="this.value = this.value.toUpperCase();"/> -->
                                </div>
                            </div>
                            <div class="col-6" @if(auth()->user()->id_tipos_usuario != 4) hidden @endif>
                                <label class="form-label">CLIENTE</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_id_cliente" id="domicilio_id_cliente">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->cliente_id}}"@selected(old('',$cliente->cliente_id) == $clienteasignado)>{{$cliente->cliente_nombre_comercial}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">ORIGEN</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_origen1" id="domicilio_origen1">
                                        <option value="">Seleccione una opción...</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->area_nombre}}">{{$area->area_nombre}} </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">OTRO ORIGEN</label>
                                <div class="input-group">
                                    <input id="domicilio_origen2" name="domicilio_origen2" class="form-control" type="text" value="{{old('origen')}}" placeholder="Escriba un origen en caso de no encontrarlo en la lista." onkeyup="this.value = this.value.toUpperCase();" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">DESTINO</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_destino1" id="domicilio_destino1">
                                        <option value="">Seleccione una opción...</option>
                                        @foreach($areas as $area)
                                            <option value="{{$area->area_nombre}}">{{$area->area_nombre}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label mt-4">OTRO DESTINO</label>
                                    <div class="input-group">
                                        <input id="domicilio_destino2" name="domicilio_destino2" class="form-control" type="text" placeholder="Escriba un destino en caso de no encontrarlo en la lista." value="{{old('destino')}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DE SERVICIO</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_id_tipo_servicio" id="domicilio_id_tipo_servicio">
                                    @foreach($tiposervicios as $tiposervicio)
                                        <option value="{{$tiposervicio->tiposervicio_id}}">{{$tiposervicio->tiposervicio_nombre}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">TIPO DE VEHÍCULO</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_id_tipo_vehiculo" id="domicilio_id_tipo_vehiculo">
                                        @foreach($tipovehiculos as $tipovehiculo)
                                            <option value="{{$tipovehiculo->tipovehiculo_id}}">{{$tipovehiculo->tipovehiculo_nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">FECHA DE ENTREGA</label>
                                <div class="input-group">
                                    <input class="form-control" id="domicilio_fecha_entrega_solicita" type="date" name="domicilio_fecha_entrega_solicita" placeholder="{{today()}}" value="{{old('fecha_entrega_solicita')}}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">HORA DE ENTREGA</label>
                                <input class="form-control" type="time" id="domicilio_hora_entrega_solicita" name="domicilio_hora_entrega_solicita" autocomplete="off" value="{{old('domicilio_hora_entrega_solicita')}}" />
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="col-md-6">
                                <label class="form-label mt-4">TRANSPORTE DE DINERO?</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_efectivo_entrega" id="domicilio_efectivo_entrega">

                                    </select>
                                </div>

                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">CUÁNTO?</label>
                                <div class="input-group">
                                    <input id="domicilio_efectivo_monto" name="domicilio_efectivo_monto" class="form-control" type="text"  onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" @if(auth()->user()->id_tipos_usuario == 2) hidden @endif>

                            <div class="col-md-6" >
                                <label class="form-label mt-4">ASIGNADO A:</label>
                                <div class="input-group">
                                    <select class="form-control" name="domicilio_asignado_a" id="domicilio_asignado_a">
                                        <option value="">Seleccione un mensajero...(SIN ASIGNAR)</option>
                                        @foreach($mensajeros as $mensajero)
                                            <option value="{{$mensajero->userid}}"> {{$mensajero->persona_nombres.' '.$mensajero->persona_apellidos}} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-6" hidden>
                                <label class="form-label mt-4">CUÁNTO?</label>
                                <div class="input-group">
                                    <input id="" name="" class="form-control" type="text"  onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="form-label mt-4">DESCRIPCIÓN DEL DOMICILIO:</label>
                            <div class="input-group">
                                <div class="form-control" id="notes" type="text">
                                    <textarea class="form-control-plaintext" required id="domicilio_descripcion" name="domicilio_descripcion" type="text" placeholder="DESCRIBA BREVEMENTE EL DETALLE DEL SERVICIO REQUERIDO">{{old('descripcion')}}</textarea>
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
