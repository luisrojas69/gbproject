@extends('layouts.master')

@section('title-page', 'Crear Vehiculo')

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
                    <li class="breadcrumb-item"><a href="{{ route('vehicle.index') }}">Vehiculos</a></li>
                    <li class="breadcrumb-item"><a href="#!">@yield('title-page')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> 
<!-- [ breadcrumb ] end -->

<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-9">

        <div class="card">

            <div class="card-header">
                <h5>@yield('title-page')</h5>
            </div>
	
            <div class="card-body">
			
				@include('partials.flash-message')

				@include('partials.forms.vehicles.form-create-vehicles')
   	
            </div>
        </div>
    </div>

    {{-- Segundo Layout --}}
    <div class="col-sm-3">
        @include('partials.forms.actions')
    </div>
    <!-- [ sample-page ] end -->
</div>
@endsection