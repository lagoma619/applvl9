@extends('layouts.app')
@section('title','USUARIOS')
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
                    <a href="{{url('/users/create')}}" class="btn btn-sm btn-success">NUEVO USUARIO</a>
                </div>
            <!-- Card Basic Info -->
                <div class="row my-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">NOMBRE</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">TIPO DE USUARIO</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">DOCUMENTO</th>
                                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">ESTADO</th>
                                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">CELULAR</th>
                                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">ID</th>
                                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">OPCIONES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--dd($usuarios)-->
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div hidden>
                                                        <img src="{{asset('assets/img/bruce-mars.jpg')}}" class="avatar avatar-sm me-3" alt="avatar image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$usuario->nombres}} {{$usuario->apellidos}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{$usuario->tipousu_nombre}}</p>
                                            </td>
                                            <td>
                                      <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-dark text-xs">{{$usuario->numero_documento}}</span>
                                      </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-secondary mb-0 text-sm">{{$usuario->usuestado_nombre}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm">{{$usuario->cel_corporativo}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm">{{$usuario->userid}}</span>
                                            </td>
                                            <td>

                                                <form action="{{url('/users/'.$usuario->userid)}}" method="post">
                                                    @csrf
                                                    <a href="{{url('/users/'.$usuario->userid.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
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
