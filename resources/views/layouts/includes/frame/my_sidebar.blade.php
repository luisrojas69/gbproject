<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					@auth	{{-- Si esta Logueado Mostramos su foto de Perfil y Datos --}}
						<div class="main-menu-header">
							<img class="img-radius" src="{{ asset('images/user/'.Auth::user()->avatar) }}" alt="User-Profile-Image">
							<div class="user-details">
								<div id="more-details">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></div>
							</div>
							
						</div>
						<div class="collapse" id="nav-user-link">
							<ul class="list-unstyled">
								<li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>Ver Perfil</a></li>
								<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Editar Perfil</a></li>
								<li class="list-group-item"><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();"><i class="feather icon-log-out m-r-5"></i>Cerrar Sesión</a></li>
							</ul>
						</div>
					@endauth

					<!-- Si no esta Logueado -->
					@guest	{{-- Si NO esta Logueado Mostramos el Avatar por Defecto --}}
						<div class="main-menu-header">
							<img class="img-radius" src="{{ asset('images/user/avatar-3.jpg') }}" alt="User-Profile-Image">
							<div class="user-details">
								<div id="more-details">Invitado <i class="fa fa-caret-down"></i></div>
							</div>
						</div>
						<div class="collapse" id="nav-user-link">
							<ul class="list-unstyled">
								<li class="list-group-item"><a href="{{ route('login') }}"><i class="feather icon-log-out m-r-5"></i>Iniciar Sesión</a></li>
								{{-- <li class="list-group-item"><a href="{{ route('register') }}"><i class="feather icon-settings m-r-5"></i>Registrarse</a></li> --}}
								
							</ul>
						</div>
					@endguest
				</div>
				
				<!--Menu de Logueados-->
			@auth
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
					    <label>Menu Principal</label>
					</li>
					@role('Admin')
						<li class="nav-item">
						    <a href="{{ route('admin') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-cog"></i></span><span class="pcoded-mtext">Panel Admnistrativo</span></a>
						</li>
					@endrole

					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fa fa-car"></i></span><span class="pcoded-mtext">Vehiculos</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{ route('vehicle.index') }}">Lista de Vehiculos</a></li>
					        <li><a href="{{ route('vehicle.create') }}">Insertar</a></li>
					    </ul>
					</li>

					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fa fa-user"></i></span><span class="pcoded-mtext">Usuarios</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{ route('user.index') }}">Lista de Usuarios</a></li>
					        <li><a href="{{ route('user.create') }}">Insertar</a></li>
					    </ul>
					</li>

					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fa fa-user-tag"></i></span><span class="pcoded-mtext">Roles y Permisos</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{ route('role.index') }}">Lista de Roles</a></li>
					        <li><a href="{{ route('role.create') }}">Insertar Rol</a></li>

					        <li><a href="{{ route('role.index') }}">Lista de Permisos</a></li>
					        <li><a href="{{ route('role.create') }}">Insertar Permiso</a></li>
					    </ul>
					</li>

				</ul>


			@endauth
				<!--FIN Menu de Logueados-->

				<!--Aviso de Invitados-->
			@guest	
				<div class="card text-center">
					<div class="card-block">
						<!--button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button-->
						<i class="feather icon-sunset f-40"></i>
						<h6 class="mt-3">Inicia Sesión</h6>
						<p>Debes iniciar sesion para ver el Menú</p>
						<a href="{{ route('login') }}" class="btn btn-primary btn-sm text-white m-0">Login</a>
					</div>
				</div>
			@endguest
				<!-- FIN Aviso de Invitados-->

			</div>
		</div>
	</nav>