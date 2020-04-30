<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="{{ asset('images/logo.png') }}" alt="" class="logo">
						<img src="{{ asset('images/logo-icon.png') }}" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Buscar">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>

					@auth {{-- Solo se muestra si está logueado --}}
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notificationes</h6>
										<div class="float-right">
											<a href="#!" class="m-r-10">marcar como leido</a>
											<a href="#!">limpiar todo</a>
										</div>
									</div>
									<ul class="noti-body">
										<li class="n-title">
											<p class="m-b-0">NUEVO</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="{{ asset('images/user/avatar-1.jpg') }}" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
													<p>Nuevo ticket agregado</p>
												</div>
											</div>
										</li>
										<li class="n-title">
											<p class="m-b-0">ANTERIORES</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="{{ asset('images/user/avatar-2.jpg') }}" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="{{ asset('images/user/avatar-1.jpg') }}" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
													<p>currently login</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="{{ asset('images/user/avatar-2.jpg') }}" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
									</ul>
									<div class="noti-footer">
										<a href="#!">show all</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="{{ asset('images/user/'.Auth::user()->avatar) }}" class="img-radius" alt="User-Profile-Image">
										<span>{{ Auth::user()->name }}</span>
										<a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
										
										<form id="logout-form2" 
					                        action="{{ route('logout') }}" 
					                        method="POST" 
					                        style="display: none;">
					                        {{ csrf_field() }}
					    		        </form>
								
									</div>
									<ul class="pro-body">
										<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Mi Perfil</a></li>
										<li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> Mis Mensajes</a></li>
										<li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> BLoquear Pantalla</a></li>
										<li><a href="javascript:void(0)" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();"><i class="feather icon-log-out"></i> Cerrar Sesión</a></li>
									</ul>
								</div>
							</div>
						</li>
						@endauth
						
						@guest {{-- Si el Usuario no se ha logueado --}}
							<div class="dropdown">
								<a class="dropdown-toggle" href="{{ route('login') }}"><i class="icon feather icon-log-in"></i></a>
							</div>
						@endguest
					</ul>
				</div>
				
			
	</header>