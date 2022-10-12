@extends('layouts.app')
@section('title','CREAR ÁREA')
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
    <script src="{{asset('assets/js/selectd.js')}}"></script> //select dinámico
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
                <a href="{{url('/areas/')}}" class="btn btn-sm btn-success">CANCELAR</a>
            </div>
            <!-- Card Basic Info -->
            <form action="{{url('areas')}}" method="POST">
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
                                    <input id="area_nombre" name="area_nombre" class="form-control" type="text" placeholder="PROVIDA FARMACEUTICA SAS" required="required" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">ESTADO ÁREA</label>
                                <select class="form-control" name="area_estado" id="area_estado">
                                    <option value="1">ACTIVO</option>
                                    <option value="2">INACTIVO</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">CLIENTE</label>
                                <div class="input-group">
                                    <select class="form-control" name="area_id_cliente" id="area_id_cliente" required="required">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre_comercial}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">SEDE</label>
                                <div class="input-group">
                                    <select class="form-control" name="area_id_sede" id="area_id_sede" required="required">
                                            <option value="">Seleccione una sede</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label mt-4">PERSONA CONTACTO</label>
                                <div class="input-group">
                                    <input id="area_nombre_contacto" name="area_nombre_contacto" class="form-control" type="text" required="required" placeholder="CAMILA CABELLO" onkeyup="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label mt-4">TELÉFONO CONTACTO</label>
                                <div class="input-group">
                                    <input id="area_telefono_contacto" name="area_telefono_contacto" class="form-control" required="required" type="number" placeholder="3117895623"/>
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

