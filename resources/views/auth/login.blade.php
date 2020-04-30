@extends('layouts.master-login')

@section('title-page', "Login")


@section('content')


<div class="auth-wrapper">
  <div class="auth-content">
    <div class="card">
      <div class="row align-items-center text-center">
        <div class="col-md-12">
          <div class="card-body">
            <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
            <h4 class="mb-3 f-w-400">Iniciar Sesion</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                  <label class="floating-label" for="Email">{{ __('E-Mail') }}</label>

                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                  <label class="floating-label" for="Password">{{ __('Password') }}</label>
                  
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                  <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember">{{ __('Recuerdame') }}</label>
                </div>

                <button type="submit" class="btn btn-block btn-primary mb-4">Iniciar</button>


            </form>
            <p class="mb-2 text-muted">Olvido su Contraseña? <a href="{{ route('password.request') }}" class="f-w-400">Reset</a></p>
            {{-- <p class="mb-0 text-muted">No tienes una Cuenta? <a href="{{ route('register') }}" class="f-w-400">Registrate</a></p> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection




