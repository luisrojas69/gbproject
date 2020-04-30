<form method="POST" action="{{ route('user.update', $user->id) }}">
	@csrf @method('PUT')
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">   
                   <label class="floating-label" for="Nombre">Nombre</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        	value="{{ $user->name }}" 
                        	name="name" 
                        	type="text">
                       
							{!! $errors->first('name', 
							'<label class="invalid-feedback">:message</label>') !!}
                
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">   
                   <label class="floating-label" for="Email">Email</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        	value="{{ $user->email }}" 
                        	name="email" 
                        	type="text">
                       
							{!! $errors->first('email', 
							'<label class="invalid-feedback">:message</label>') !!}
                
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">   
                   <label class="floating-label" for="Password">Password</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            name="password" 
                            type="password">
                    <small class="form-text text-muted">Dejar en blanco si no desea actualizar</small>                        
                            {!! $errors->first('password', 
                            '<label class="invalid-feedback">:message</label>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">   
                   <label class="floating-label" for="Password">Repetir Password</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            name="password_confirmation" 
                            type="password">
                       
                            {!! $errors->first('password', 
                            '<label class="invalid-feedback">:message</label>') !!}              
                </div>
            </div>

            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Editar</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancelar</a>
            </div>

        </div>
	</form>