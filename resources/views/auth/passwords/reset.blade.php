@extends('layouts.master-login')

@section('title-page', "Cambiar Contraseña")

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

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            
                            <input type="hidden" name="token" value="{{ $token }}">
                            
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Username">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">{{ __('Confima tu Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>



                            <button type="submit" class="btn btn-block btn-primary mb-4">{{ __('Cambiar Password') }}</button>
                        
                        </form>    

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ reset-password ] end -->
</div>

@endsection
