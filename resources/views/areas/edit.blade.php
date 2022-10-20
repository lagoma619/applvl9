@extends('layouts.app')
@section('title','EDITAR ÁREA')
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
                <a href="{{route('areas.index')}}" class="btn btn-sm btn-success">CANCELAR</a>
            </div>
            <!-- Card Basic Info -->
            <form action="{{route('areas.update',$area->area_id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>DATOS DEL ÁREA</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">NOMBRE</label>
                                <div class="input-group">
                                    <input id="area_nombre" name="area_nombre" class="form-control" type="text" placeholder="PROVIDA FARMACEUTICA SAS" required="required" value="{{old('area_nombre',$area->area_nombre)}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">ESTADO ÁREA</label>
                                <select class="form-control" name="area_estado" id="area_estado" required="required">
                                    @foreach($usuarioestados as $usuarioestado)
                                        <option value="{{$usuarioestado->usuestado_id}}" @selected(old('area_id_estado', $usuarioestado->usuestado_id) == $area->area_id_estado) @if($usuarioestado->usuestado_id==3 or $usuarioestado->usuestado_id==4)hidden @endif>{{$usuarioestado->usuestado_nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">CLIENTE</label>
                                <div class="input-group">
                                    <select class="form-control" name="area_id_cliente" id="area_id_cliente" required="required">
                                        <option value="">Seleccione un cliente...</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->cliente_id}}" @selected(old('area_id_cliente', $cliente->cliente_id) == $area->area_id_cliente)>{{$cliente->cliente_nombre_comercial}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">SEDE</label>
                                <div class="input-group">
                                    <select class="form-control" name="area_id_sede" id="area_id_sede" required="required">
                                        @foreach($sedes as $sede)
                                            <option value="{{$sede->sede_id}}" @selected(old('area_id_sede', $sede->sede_id) == $area->area_id_sede)>{{$sede->sede_nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="area_nombre_contacto" name="area_nombre_contacto" class="form-control" type="text" required="required" placeholder="CAMILA CABELLO" value="{{old('area_nombre_contacto',$area->area_nombre_contacto)}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="area_telefono_contacto" name="area_telefono_contacto" class="form-control" type="number" required="required" placeholder="3117895623" value="{{old('area_telefono_contacto',$area->area_telefono_contacto)}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                        </div>

                        <div class="d-flex justify-content-center mt-6">
                            <button type="submit" class="btn btn-primary btn-lg w-80">GUARDAR</button>
                        </div>
                    </div>
                </div>
            </form>
                <script src="{{asset('assets/js/selectd.js')}}"></script>
@endsection

