<div class="form-group <?php echo e($errors->has('product_name') ? 'has-error' : ''); ?>">
    <label for="product_name" class="control-label"><?php echo e('Product Name'); ?></label>
    <input class="form-control" name="product_name" type="text" id="product_name" value="<?php echo e(isset($product->product_name) ? $product->product_name : ''); ?>" >
    <?php echo $errors->first('product_name', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group <?php echo e($errors->has('product_category') ? 'has-error' : ''); ?>">
    <label for="product_category" class="control-label"><?php echo e('Product Category'); ?></label>
    <select name="product_category" class="form-control" id="product_category" >
    <?php $__currentLoopData = json_decode('{"test1":"test1"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e((isset($product->product_category) && $product->product_category == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo $errors->first('product_category', '<p class="help-block">:message</p>'); ?>

</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Update' : 'Create'); ?>">
</div>
<?php /**PATH D:\GITHUB\New-Ecom\resources\views/admin/products/form.blade.php ENDPATH**/ ?>