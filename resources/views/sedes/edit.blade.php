@extends('layouts.app')
@section('title','CREAR SEDE')
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
                <a href="{{route('sedes.index')}}" class="btn btn-sm btn-success">CANCELAR</a>
            </div>
            <!-- Card Basic Info -->
            <form action="{{route('sedes.update',$sede->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>DATOS DE LA SEDE</h5>
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
                                    <input id="sede_nombre" name="sede_nombre" class="form-control" type="text" placeholder="PROVIDA FARMACEUTICA SAS" required="required" value="{{old('nombre',$sede->sede_nombre)}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">CLIENTE</label>
                                <div class="input-group">
                                    <select class="form-control" name="sede_id_cliente" id="sede_id_cliente">
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}" @selected(old('sede_id_cliente', $cliente->id) == $sede->sede_id_cliente)>{{$cliente->nombre_comercial}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">DIRECCIÓN</label>
                                <div class="input-group">
                                    <input id="sede_direccion" name="sede_direccion" class="form-control" type="text" placeholder="CARRERA 44 #9C-58" value="{{old('sede_direccion',$sede->sede_direccion)}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mt-4">ESTADO SEDE</label>
                                <select class="form-control" name="id_estado" id="id_estado">
                                    @foreach($usuarioestados as $usuarioestado)
                                        <option value="{{$usuarioestado->id}}" @selected(old('sede_id_estado', $usuarioestado->id) == $sede->sede_id_estado) @if($usuarioestado->id==3 or $usuarioestado->id==4)hidden @endif>{{$usuarioestado->usuestado_nombre}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="sede_nombre_contacto" name="sede_nombre_contacto" class="form-control" type="text" placeholder="CAMILA CABELLO" value="{{old('sede_nombre_contacto',$sede->sede_nombre_contacto)}}" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="sede_telefono_contacto" name="sede_telefono_contacto" class="form-control" type="number" placeholder="3117895623" value="{{old('sede_telefono_contacto',$sede->sede_telefono_contacto)}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                        </div>

                        <div class="row">

                            <label class="form-label mt-4">NOTAS</label>
                            <div class="input-group">
                                <div class="form-control" type="text">
                                    <textarea class="form-control-plaintext" id="sede_notas" name="sede_notas" type="text" placeholder="ESCRIBA AQUÍ LAS NOTAS RELACIONADAS A LA SEDE">{{old('sede_notas',$sede->sede_notas)}}</textarea>
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
