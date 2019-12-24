<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="Name" class="control-label">Name</label>
    <input type="text" class="form-control" required value="">
</div>

<div class="form-group {{ $errors->has('permissions') ? 'has-error' : ''}}">
<label for="Permissions" class="control-label">Permissions</label>
<select name="permissions" id="permissions">
    @foreach($permissions as $p)
    <option value="{{ $p->name }}">{{ $p->name }}</option>
    @endforeach
</select>
</div>

<div class="form-group {{ $errors->has('permissions') ? 'has-error' : ''}}">
    {!! Form::label('permissions', 'Permission', ['class' => 'control-label']) !!}
    {!! Form::select('permissions[]', $permissions, old('permissions')??isset($role)?$role->permissions->pluck('name','name'):null, ('' == 'required') ? ['class' => 'form-control',
    'required' => 'required','multiple'] : ['class' => 'form-control','multiple']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>