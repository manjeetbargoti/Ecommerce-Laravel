<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <?php echo Form::label('title', 'Title', ['class' => 'control-label']); ?>

    <?php echo Form::text('title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

    <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
    <?php echo Form::label('content', 'Content', ['class' => 'control-label']); ?>

    <?php echo Form::textarea('content', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

    <?php echo $errors->first('content', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group <?php echo e($errors->has('is_permission') ? 'has-error' : ''); ?>">
    <?php echo Form::label('is_permission', 'Is Permission', ['class' => 'control-label']); ?>

    <?php echo Form::number('is_permission', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

    <?php echo $errors->first('is_permission', '<p class="help-block">:message</p>'); ?>

</div>


<div class="form-group">
    <?php echo Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']); ?>

</div>
<?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/admin/posts/form.blade.php ENDPATH**/ ?>