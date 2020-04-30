@extends('layouts.master')

@section('title-page', "Administracion")

@section('message')
{{-- Incluimos las plantillas de error and success --}}
@endsection

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
                            <li class="breadcrumb-item"><a href="#!">@yield('title-page')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
      <!-- [ breadcrumb ] end -->
   
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>@yield('title-page')</h5>
                        @include('layouts.includes.frame.my_function_windows')
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4 col-lg-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <i class="fa fa-car text-c-blue d-block f-40"></i>
                                        <h4 class="m-t-20"><span class="text-c-blue">{{ $vehicles }}</span> Vehiculos</h4>
                                        <a class="btn btn-primary btn-sm btn-round" href = '{{ route('vehicle.index') }}'>Administrar</a>
                                        <a class="btn btn-success btn-sm btn-round" href = '#'>Ver Reportes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <i class="fa fa-user text-c-blue d-block f-40"></i>
                                        <h4 class="m-t-20"><span class="text-c-blue">{{ $users }}</span> Usuarios</h4>
                                        <a class="btn btn-primary btn-sm btn-round" href = '{{ route('user.index') }}'>Administrar</a>
                                        <a class="btn btn-success btn-sm btn-round" href = '#'>Ver Reportes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <i class="fa fa-user-tag text-c-blue d-block f-40"></i>
                                        <h4 class="m-t-20"><span class="text-c-blue">{{ $roles }}</span> Roles</h4>
                                        <a class="btn btn-primary btn-sm btn-round" href = '{{ route('role.index') }}'>Administrar</a>
                                        <a class="btn btn-success btn-sm btn-round" href = '#'>Ver Reportes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <i class="fa fa-user-shield text-c-blue d-block f-40"></i>
                                        <h4 class="m-t-20"><span class="text-c-blue">{{ $permissions }}</span> Permisos</h4>
                                        <a class="btn btn-primary btn-sm btn-round" href = '{{ route('user.index') }}'>Administrar</a>
                                        <a class="btn btn-success btn-sm btn-round" href = '#'>Ver Reportes</a>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>

@endsection

 