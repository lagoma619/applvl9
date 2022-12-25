@extends('layouts.app')
@section('title','DOMICILIOS')
@section('scripts')
    <!-- SELECTOR DE FECHA -->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/vendor/datepicker/css/bootstrap-datepicker3.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/cursortr.css')}}"> <!--Cursor para tr de la tabla-->
    <script src="{{asset('assets/vendor/datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    <script>
        //Script para activar href en tr
        /* $(document).ready(function(){
            $('table tr').click(function(){
                window.location = $(this).data('href');
                return false;
            });
        }); */
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
                        <div class="alert alert-success" role="alert">
                            <strong>{{session('notification')}}</strong>
                        </div>
                    </div>
                @endif
                <div class="col" >
                    <a href="{{route('domicilios.create')}}" class="btn btn-sm btn-success">NUEVO DOMICILIO</a>
                </div>
            <!-- Card Basic Info -->
                <div class="row my-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 table-striped table-hover">
                                    <thead data-size="">
                                    <tr data-bs-toggle="popover" title="Para ver los detalles del domicilio hacer clic en el ID" data-bs-trigger="hover focus" >
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">ID</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">CLIENTE</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">ASIGNADO A</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">ORIGEN</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">DESTINO</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">TIPO DE SERVICIO</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">TIPO VEHÍCULO</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">FECHA SOLICITADA</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">HORA SOLICITADA</th>

                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-75">OPCIONES</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    <!--dd($usuarios)-->
                                    @foreach($domicilios as $domicilio)
                                        <tr>
                                            <td class="align-middle text-center">

                                                <span><a class="link-info" href={{url('domicilios/detalledomicilio')}}{{'/'.$domicilio->domicilio_id}}>{{$domicilio->domicilio_id}}</a> </span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div hidden>
                                                        <img src="{{asset('assets/img/bruce-mars.jpg')}}" class="avatar avatar-sm me-3" alt="avatar image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$domicilio->cliente_nombre_comercial}}</h6>
                                                    </div>
                                                </div>
                                            <td class="text-start">
                                                    <span class="text-secondary text-sm">{{\App\Models\Persona::find($domicilio->domicilio_asignado_a)->persona_nombres ?? 'SIN '}} {{\App\Models\Persona::find($domicilio->domicilio_asignado_a)->persona_apellidos ?? 'ASIGNAR'}}</span>
                                            </td>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-sm text-secondary mb-0">{{$domicilio->domicilio_origen}}</p>
                                            </td>
                                            <td class="text-start">
                                            <span class="badge badge-dot me-4">
                                            <span class="text-secondary mb-0 text-sm">{{$domicilio->domicilio_destino}}</span>
                                            </span>
                                            </td class="text-start">
                                            <td class="text-sm">
                                                <p class="text-secondary mb-0 text-sm">{{$domicilio->tiposervicio_nombre}}</p>
                                            </td>
                                            <td class="text-start text-sm">
                                                <p class="text-secondary mb-0 text-sm">{{$domicilio->tipovehiculo_nombre}}</p>
                                            </td>
                                            <td  class="text-start">
                                                <span class="text-secondary text-sm">{{$domicilio->domicilio_fecha_entrega_solicita}}</span>
                                            </td>
                                            <td class="text-start">
                                                <span class="text-secondary text-sm">{{$domicilio->domicilio_hora_entrega_solicita}}</span>
                                            </td>
                                            <td>
                                                <form action="{{url('/domicilios/'.$domicilio->domicilio_id)}}" method="post">
                                                    @csrf
                                                    <a href="{{url('/domicilios/'.$domicilio->domicilio_id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
