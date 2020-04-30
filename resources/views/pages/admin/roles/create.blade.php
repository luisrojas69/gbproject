@extends('layouts.master')

@section('title-page', 'Crear Role')

@push('styles')
    <link rel="stylesheet" href="{{ asset('template/assets/css/plugins/select2.min.css') }}">
@endpush

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
                    <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
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

				@include('partials.forms.roles.form-create-roles')
   	
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- select2 Js -->
<script src="{{ asset('template/assets/js/plugins/select2.full.min.js') }}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('template/assets/js/pages/form-select-custom.js') }}"></script>

@endpush