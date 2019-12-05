<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($productquery->name) ? $productquery->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($productquery->email) ? $productquery->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($productquery->phone) ? $productquery->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('query_message') ? 'has-error' : ''}}">
    <label for="query_message" class="control-label">{{ 'Query Message' }}</label>
    <textarea class="form-control" rows="5" name="query_message" type="textarea" id="query_message" >{{ isset($productquery->query_message) ? $productquery->query_message : ''}}</textarea>
    {!! $errors->first('query_message', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    <input class="form-control" name="product_id" type="text" id="product_id" value="{{ isset($productquery->product_id) ? $productquery->product_id : ''}}" >
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_type') ? 'has-error' : ''}}">
    <label for="product_type" class="control-label">{{ 'Product Type' }}</label>
    <input class="form-control" name="product_type" type="text" id="product_type" value="{{ isset($productquery->product_type) ? $productquery->product_type : ''}}" >
    {!! $errors->first('product_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($productquery) && 1 == $productquery->status) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" @if (isset($productquery)) {{ (0 == $productquery->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('terms') ? 'has-error' : ''}}">
    <label for="terms" class="control-label">{{ 'Terms' }}</label>
    <div class="radio">
    <label><input name="terms" type="radio" value="1" {{ (isset($productquery) && 1 == $productquery->terms) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="terms" type="radio" value="0" @if (isset($productquery)) {{ (0 == $productquery->terms) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('terms', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
