<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="Name" class="control-label"></label>
    <input type="text" name="name" id="Name" class="form-control" value="{{ isset($permission->name) ? $permission->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
