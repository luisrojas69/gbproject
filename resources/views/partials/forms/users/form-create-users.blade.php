<form method="POST" action="{{ route('user.store') }}">
	@csrf
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">   
                   <label class="floating-label" for="Nombre">Nombre</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        	name="name"
                            value="{{ old('name') }}"  
                        	type="text">
                       
							{!! $errors->first('name', 
							'<label class="invalid-feedback">:message</label>') !!}
                
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">   
                   <label class="floating-label" for="Email">Email</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        	name="email"
                            value="{{ old('email') }}"  
                        	type="text">
                       
							{!! $errors->first('email', 
							'<label class="invalid-feedback">:message</label>') !!}
                
                </div>
            </div>

            <div class="col-sm-12">
                <small class="form-text text-muted">La Contraseña será generda automaticamanete y enviada al usuario via email</small>
                <hr>
            </div>  
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label for=""> Roles</label>
                    @include('partials.forms.users.roles-checkboxes')    
                </div>    
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Permisos</label>
                    @include('partials.forms.users.permissions-checkboxes')
                </div>                
            </div>
                    
            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancelar</a>
            </div>

        </div>
	</form>