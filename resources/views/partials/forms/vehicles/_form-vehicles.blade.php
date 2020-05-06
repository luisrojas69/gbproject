    @csrf

    <div class="col-sm-6">
        <div class="form-group">   
           <label class="floating-label" for="Placa">Placa</label>
                <input class="form-control {{ $errors->has('plate') ? 'is-invalid' : '' }}"
                	value="{{ old('plate', $vehicle->plate) }}" 
                	name="plate" 
                	type="text"
                	placeholder="" >
               
					{!! $errors->first('plate', 
					'<label class="invalid-feedback">:message</label>') !!}
        
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">   
           <label class="floating-label" for="Color">Color</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}"
                	value="{{ old('color', $vehicle->color) }}" 
                	name="color" 
                	type="text"
                	placeholder="" >
               
					{!! $errors->first('color', 
					'<label class="invalid-feedback">:message</label>') !!}
        
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">   
           <label class="floating-label" for="Marca">Marca</label>
                <input class="form-control {{ $errors->has('mark') ? 'is-invalid' : '' }}"
                	value="{{ old('mark', $vehicle->mark) }}" 
                	name="mark" 
                	type="text"
                	placeholder="" >
               
					{!! $errors->first('mark', 
					'<label class="invalid-feedback">:message</label>') !!}
        
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">   
           <label class="floating-label" for="Modelo">Modelo</label>
                <input class="form-control {{ $errors->has('mark') ? 'is-invalid' : '' }}"
                	value="{{ old('model', $vehicle->model) }}" 
                	name="model" 
                	type="text"
                	placeholder="" >
               
					{!! $errors->first('model', 
					'<label class="invalid-feedback">:message</label>') !!}
        
        </div>
    </div>


    <div class="col-sm-12">
        <div class="form-group">
            <label class="floating-label" for="Description">Comentarios (Opcional)</label>
            	<textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
            		name="comment" 
            		rows="3">{{ old('comment', $vehicle->comment) }}</textarea>
            	{!! $errors->first('comment', 
					'<label class="invalid-feedback">:message</label>') !!}
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">{{ $btnText }}</button>
            <a href="{{ route('vehicle.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>