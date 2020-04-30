<form method="POST" action="{{ route('role.store') }}">
	@csrf
        <div class="row">

            <div class="col-sm-12">
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
  
                        
            <div class="col-sm-12">
                <div class="form-group">
                    @include('partials.forms.roles.permissions-checkboxes')
                </div>                
            </div>
                    
            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{ route('role.index') }}" class="btn btn-danger">Cancelar</a>
            </div>

        </div>
	</form>