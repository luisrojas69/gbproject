@extends('layouts.master')

@section('title-page', 'Lista de Vehiculos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('template/assets/css/plugins/jquery-confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/plugins/dataTables.bootstrap4.min.css') }}">
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
                    <li class="breadcrumb-item"><a href="#">Vehiculos</a></li>
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

                    <div class="card-header-right">
                        @can('roles.create')
                            <a href="{{ route('role.create') }}" 
                                class="btn btn-primary m-0">
                                <i class="feather icon-plus"></i>
                                    Nuevo Role
                            </a>
                        @else
                            <button class="btn btn-primary disabled btn-denied">
                                <i class="feather icon-plus"></i>
                                Nuevo Role
                            </button>
                        @endcan

                    </div>

            </div>


            <div class="card-body">
                
                @include('partials.flash-message')

               	<div class="dt-responsive table-responsive" id="printTable">
                    <table id="basic-btn" class="table table-striped table-bordered nowrap table-hover">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">NOMBRE</th>
                                <th class="border-top-0">GUARD</th>
                                <th class="border-top-0"
                                    style="width: auto;">
                                    PERMISOS
                                    </th>
                                <th class="border-top-0" 
                                    style="width: auto; text-align: center;">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach ($roles as $role)
								<tr>
                                    <td> {{ $role->id }} </td>
                                    <td> {{ $role->name }} </td>
                                    <td> {{ $role->guard_name }} </td>
                                    <td>
                                        <small class="form-text text-muted">
                                            {{ $role->permissions->pluck('name')->implode(', ') }}
                                        </small>
                                    </td>
                                    <td style="text-align: center;">
                                
                                @can('roles.edit')
                                    <a href="{{ route('role.edit', $role) }}" 
                                        class="btn btn-info btn-sm">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                @else 
                                    <button class="btn btn-info btn-sm disabled btn-denied">
                                        <i class="feather icon-edit"></i>
                                    </button>   
                                @endcan
                                
                                @can('roles.destroy')
                                    <button 
                                        class="btn btn-danger btn-sm btn-delete"
                                        id="{{ $role->id }}"
                                        {{-- onclick="return confirm('Seguro desea Eliminar este registro?')" --}}>
                                        <i class="feather icon-trash-2"></i>
                                    </button>

                                    <form 
                                        method="POST"
                                        id="form-destroy-{{ $role->id }}" 
                                        action="{{ route('role.destroy', $role) }}" 
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                    </form>
                                @else
                                    <button 
                                        class="btn btn-danger btn-sm disabled btn-denied">
                                        <i class="feather icon-trash-2"></i>
                                    </button>    
                                @endcan    

                                    </td>
                            	</tr>
							@endforeach
                        </tbody>
                    </table>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset ('template/assets/js/plugins/jquery-confirm.js') }}"></script>
    <script src="{{ asset ('scripts/confirm-delete.js') }}"></script>

    <script>
        function printData() {
            var divToPrint = document.getElementById("printTable");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
        $('.btn-print-invoice').on('click', function() {
            printData();
        })
    </script>

    <script src="{{ asset('template/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/datatables/data-export-custom.js') }}"></script>

@endpush