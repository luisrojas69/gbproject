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

	{{-- Botonera de Acciones --}}
	{{-- <div class="col-xl-3 col-md-3">
		<a href="#">
			<div class="card">
				<div class="card-body">
					<div class="row align-items-center m-l-0">
						<div class="col-auto">
							<i class="fas fa-file-pdf f-30 text-c-red"></i>
						</div>
						<div class="col-auto">
							<h6 class="text-muted m-b-10">Generar PDF</h6>
						</div>
					</div>
				</div>
			</div>
		</a>   
	</div>
	<div class="col-xl-3 col-md-3">
		<a href="{{ route('vehicles.report') }}">
			<div class="card">
				<div class="card-body">
					<div class="row align-items-center m-l-0">
						<div class="col-auto">
							<i class="fas fa-file-excel f-30 text-c-green"></i>
						</div>
						<div class="col-auto">
							<h6 class="text-muted m-b-10">Generar Excel</h6>
						</div>
					</div>
				</div>
			</div>
		</a>   
	</div>
	<div class="col-xl-3 col-md-3">
		<div class="card">
			<div class="card-body btn-print-invoice">
				<div class="row align-items-center m-l-0">
					<div class="col-auto">
						  <i class="fas fa-print f-30 text-c-yellow"></i>
                    </div>
					<div class="col-auto">
						<h6 class="text-muted m-b-10">Imprimir</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-3">
		<a href="{{ route('vehicles.report') }}">
			<div class="card">
				<div class="card-body">
					<div class="row align-items-center m-l-0">
						<div class="col-auto">
							<i class="fas fa-chart-bar f-30 text-c-purple"></i>
						</div>
						<div class="col-auto">
							<h6 class="text-muted m-b-10">Ver Reportes</h6>
						</div>
					</div>
				</div>
			</div>
		</a>   
	</div> --}}
	{{-- Fin de la Botonera --}}
    
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>@yield('title-page')</h5>

                    <div class="card-header-right">
                        @can('vehicles.create')
                            <a href="{{ route('vehicle.create') }}" 
                                class="btn btn-primary m-0">
                                <i class="feather icon-plus"></i>
                                    Nuevo Veh&iacute;culo
                            </a>
                        @else
                            <button class="btn btn-primary disabled btn-denied">
                                <i class="feather icon-plus"></i>
                                Nuevo Vehiculo
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
                                <th class="border-top-0">PLACA</th>
                                <th class="border-top-0">MARCA</th>
                                <th class="border-top-0">MODELO</th>
                                <th class="border-top-0">COLOR</th>
                                <th class="border-top-0" 
                                    style="width: auto; text-align: center;">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach ($vehicles as $vehicle)
								<tr>
                                    <td> {{ $vehicle->plate }} </td>
                                    <td> {{ $vehicle->mark }} </td>
                                    <td> {{ $vehicle->model }} </td>
                                    <td> {{ $vehicle->color }} </td>
                                    <td style="text-align: center;">
                                
                                @can('vehicles.edit')
                                    <a href="{{ route('vehicle.edit', $vehicle) }}" 
                                        class="btn btn-info btn-sm">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                @else 
                                    <button class="btn btn-info btn-sm disabled btn-denied">
                                        <i class="feather icon-edit"></i>
                                    </button>   
                                @endcan
                                
                                @can('vehicles.destroy')
                                    <button 
                                        class="btn btn-danger btn-sm btn-delete"
                                        id="{{ $vehicle->id }}"
                                        {{-- onclick="return confirm('Seguro desea Eliminar este registro?')" --}}>
                                        <i class="feather icon-trash-2"></i>
                                    </button>

                                    <form 
                                        method="POST"
                                        id="form-destroy-{{ $vehicle->id }}" 
                                        action="{{ route('vehicle.destroy', $vehicle) }}" 
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