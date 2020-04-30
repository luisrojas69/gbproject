@extends('layouts.master')

@section('title-page', 'Editar Usuario')

@section('content')
	<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">@yield('title-page')</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Administración</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item"><a href="#!">@yield('title-page')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> 
<!-- [ breadcrumb ] end -->

<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-6">

        <div class="card">

            <div class="card-header">
                <h5>@yield('title-page')</h5>
            </div>
	
            <div class="card-body">
			
				@include('partials.flash-message')

				@include('partials.forms.users.form-edit-users')
   	
            </div>
        </div>
    </div>

    {{-- Segundo Layout --}}
    <div class="col-sm-3">
        <div class="card">

            <div class="card-header">
                <h5>Roles</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.roles.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    @include('partials.forms.users.roles-checkboxes')    
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit">Actulizar Roles</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    
    {{-- Tercer Layout --}}
    <div class="col-sm-3">
        <div class="card">

            <div class="card-header">
                <h5>Permisos</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.permissions.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    @include('partials.forms.users.permissions-checkboxes')    
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit">Actulizar Permisos</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@endsection