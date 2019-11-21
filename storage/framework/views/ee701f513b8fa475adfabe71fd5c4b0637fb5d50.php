<div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
    <?php echo Form::label('first_name', 'First Name', ['class' => 'control-label']); ?>

    <?php echo Form::text('first_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

    <?php echo $errors->first('first_name', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <?php echo Form::label('email', 'Email', ['class' => 'control-label']); ?>

    <?php echo Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

    <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <?php echo Form::label('password', 'Password', ['class' => 'control-label']); ?>

    <?php echo Form::password('password', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

    <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
    <?php echo Form::label('roles', 'Role', ['class' => 'control-label']); ?>

    <?php echo Form::select('roles[]', $roles, isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

    <?php echo $errors->first('role', '<p class="help-block">:message</p>'); ?>

</div>


<div class="form-group">
    <?php echo Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']); ?>

</div>
<?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/admin/user/form.blade.php ENDPATH**/ ?>