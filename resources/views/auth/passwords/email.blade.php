@extends('layouts.master-login')

@section('title-page', "Resetear Contraseña")

@section('content')


<div class="auth-wrapper">
    <!-- [ reset-password ] start -->
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ asset('template/assets/images/logo-dark.png') }}" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">@yield('title-page')</h4>
                        
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group mb-4">
                                <label class="floating-label" for="Username">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <button type="submit" class="btn btn-block btn-primary mb-4">{{ __('Enviar Link de Reseteo de Clave') }}</button>
                            <p class="mb-0 text-muted">No tienes Cuenta? <a href="javascript:void(0)" onclick="return alert('Comunicate con el Administrador para que te cree una Cuenta')" class="f-w-400">Click Aqui</a></p>

                        </form>    

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ reset-password ] end -->
</div>

@endsection
