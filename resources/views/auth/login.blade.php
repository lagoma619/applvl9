@extends('layouts.app')

@section('content')


<div class="page-header min-vh-100" style="background-image: url('https://www.aquitoymensajeria.com/wp-content/uploads/2019/08/bannerweb-01-2.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7">
                    <div class="card border-0 mb-0">
                        <div class="card-header bg-transparent">
                        <h5 class="text-dark text-center mt-2 mb-3">Iniciar sesión</h5>
                        </div>
                        <div class="card-body px-lg-5 pt-0">
                            <div class="text-center text-muted mb-4">
                                <small>Escriba número de documento y contraseña</small>
                            </div>
                            <div class="mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="# Documento" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="rememberMe">Recordarme</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Iniciar sesión</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
