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
    <script src="{{asset('assets/js/selectd.js')}}"></script> //select dinámico

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
                <a href="{{route('areas.index')}}" class="btn btn-sm btn-success">CANCELAR</a>
            </div>
            <!-- Card Basic Info -->
            <form action="{{route('areas.update',$area->id)}}" method="POST">
                @csrf
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
                                    <input id="nombre" name="nombre" class="form-control" type="text" placeholder="PROVIDA FARMACEUTICA SAS" required="required" value="{{old('nombre',$area->nombre)}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">ESTADO ÁREA</label>
                                <select class="form-control" name="estado" id="estado" required="required">
                                    @foreach($usuarioestados as $usuarioestado)
                                        <option value="{{$usuarioestado->id}}" @selected(old('id_estado', $usuarioestado->id) == $area->id_estado) @if($usuarioestado->id==3 or $usuarioestado->id==4)hidden @endif>{{$usuarioestado->usuestado_nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">CLIENTE</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_cliente" id="sel_cliente" required="required">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}" @selected(old('id_cliente', $cliente->id) == $area->id_cliente)>{{$cliente->nombre_comercial}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">UBICACIÓN</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_sede" id="id_sede" required="required">
                                        <option value="">Seleccione una sede</option>
                                        @foreach($sedes as $sede)
                                            <option value="{{$sede->id}}" @selected(old('id_sede', $sede->id) == $area->id_sede)>{{$sede->nombre}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="nombre_contacto" name="nombre_contacto" class="form-control" type="text" required="required" placeholder="CAMILA CABELLO" value="{{old('nombre_contacto',$area->nombre_contacto)}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="telefono_contacto" name="telefono_contacto" class="form-control" type="number" required="required" placeholder="3117895623" value="{{old('telefono_contacto',$area->telefono_contacto)}}"/>
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
@endsection

