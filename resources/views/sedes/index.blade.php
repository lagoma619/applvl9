@extends('layouts.app')
@section('title','SEDES')
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
                        <div class="alert alert-success" role="alert">
                            <strong>{{session('notification')}}</strong>
                        </div>
                    </div>
                @endif
                <div class="col" >
                    <a href="{{route('sedes.create')}}" class="btn btn-sm btn-success">NUEVA SEDE</a>
                </div>
            <!-- Card Basic Info -->
                <div class="row my-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">NOMBRE</th>
                                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">DIRECCIÓN</th>
                                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">CONTACTO</th>
                                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">TELÉFONO</th>

                                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">OPCIONES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--dd($usuarios)-->
                                    @foreach($sedes as $sede)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm">{{$sede->id}}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div hidden>
                                                        <img src="{{asset('assets/img/bruce-mars.jpg')}}" class="avatar avatar-sm me-3" alt="avatar image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$sede->nombre}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{$sede->direccion}}</p>
                                            </td>
                                            <td>
                                      <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xs">{{$sede->nombre_contacto}}</span>
                                      </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-secondary mb-0 text-sm">{{$sede->telefono_contacto}}</p>
                                            </td>
                                            <td>
                                                <form action="{{url('/sedes/'.$sede->userid)}}" method="post">
                                                    @csrf
                                                    <a href="{{url('/sedes/'.$sede->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
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
