<div class="form-group {{ $errors->has('product_name') ? 'has-error' : ''}}">
    <label for="product_name" class="control-label">{{ 'Product Name' }}</label>
    <input class="form-control" name="product_name" type="text" id="product_name" value="{{ isset($product->product_name) ? $product->product_name : ''}}" >
    {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_category') ? 'has-error' : ''}}">
    <label for="product_category" class="control-label">{{ 'Product Category' }}</label>
    <select name="product_category" class="form-control" id="product_category" >
    @foreach (json_decode('{"test1":"test1"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($product->product_category) && $product->product_category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('product_category', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
