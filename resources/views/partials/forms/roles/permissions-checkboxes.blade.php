{{-- @foreach ($permissions as $id => $name)
    <div class="checkbox">
        <label>
            <input type="checkbox" value="{{ $id }}" name="permissions[]" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
            {{ $name }}
        </label>
    </div>
@endforeach --}}

<p>Seleccione los Permisos asociados a este Role.</p>
<select class="js-example-basic-multiple col-sm-12" name="permissions[]" multiple="multiple">
	@foreach ($permissions as $id => $name)
	    <option value="{{ $id }}" {{ $role->permissions->contains($id) ? 'selected' : '' }}>{{ $name }}</option>
	@endforeach
    
</select>