<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <?php echo Form::label('name', 'Name', ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class'
    => 'form-control']); ?>

    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>

<div class="form-group <?php echo e($errors->has('permissions') ? 'has-error' : ''); ?>">
    <?php echo Form::label('permissions', 'Permission', ['class' => 'control-label']); ?>

    <?php echo Form::select('permissions[]', $permissions, old('permissions')??isset($role)?$role->permissions->pluck('name','name'):null, ('' == 'required') ? ['class' => 'form-control',
    'required' => 'required','multiple'] : ['class' => 'form-control','multiple']); ?>

    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>

<div class="form-group">
    <?php echo Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']); ?>

</div><?php /**PATH D:\GITHUB\New-Ecom\resources\views/admin/role/form.blade.php ENDPATH**/ ?>