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

    </div>
</form>