<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Users
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">Edit user #<?php echo e($user->id); ?> (<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>)</div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/user')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>

                        <form action="<?php echo e(url('admin/user/'.$user->id)); ?>"  method="POST"
                            class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            <input name="_method" type="hidden" value="PATCH">
                            <?php echo csrf_field(); ?>
                            <!-- User Role Select Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="User Role" class="col-form-label"><?php echo e(__('User Role *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="roles[]" id="roles"
                                        class="validate[required] form-control select2 <?php if ($errors->has('roles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('roles'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        required value="<?php echo e(old('roles')); ?>">
                                        <option value="">Select a Role</option>
                                        <?php $__currentLoopData = Spatie\Permission\Models\Role::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($roles->name); ?>" <?php if(implode(', ', $user->getRoleNames()->toArray()) == $roles->name): ?> selected <?php endif; ?>><?php echo e($roles->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.User Role Select Field -->

                            <!-- User Title Select Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="User Role" class="col-form-label"><?php echo e(__('User Title *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="title" id="UserTitle"
                                        class="validate[required] form-control select2 <?php if ($errors->has(' title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first(' title'); ?> is-invalid
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required value="<?php echo e(old('title')); ?>">
                                        <option value="">Select a Title</option>
                                        <option value="Mr." <?php if($user->title == 'Mr.'): ?> selected <?php endif; ?>>Mr.</option>
                                        <option value="Ms." <?php if($user->title == 'Ms.'): ?> selected <?php endif; ?>>Ms.</option>
                                        <option value="Mrs." <?php if($user->title == 'Mrs.'): ?> selected <?php endif; ?>>Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.User Title Select Field -->

                            <!-- Username Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Username" class="col-form-label"><?php echo e(__('Username *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="Username" name="username"
                                        class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required
                                        value="<?php echo e($user->username); ?>">
                                </div>
                            </div>
                            <!-- /.Username Input Field -->

                            <!-- First Name Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="First Name" class="col-form-label"><?php echo e(__('First Name *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="FirstName" name="first_name"
                                        class="form-control <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required
                                        value="<?php echo e($user->first_name); ?>">
                                </div>
                            </div>
                            <!-- /.First Name Input Field -->

                            <!-- Last Name Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Last Name" class="col-form-label"><?php echo e(__('Last Name *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="LastName" name="last_name"
                                        class="form-control <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e($user->last_name); ?>">
                                </div>
                            </div>
                            <!-- /.Last Name Input Field -->

                            <!-- Email Address Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="email" class="col-form-label"><?php echo e(__('E-mail *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="email" id="EmailAddress" name="email"
                                        class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required
                                        value="<?php echo e($user->email); ?>">
                                </div>
                            </div>
                            <!-- Email Address Input Field -->

                            <!-- Phone Number Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Phone" class="col-form-label"><?php echo e(__('Phone *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="PhoneNumber" name="phone"
                                        class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required
                                        value="<?php echo e($user->phone); ?>">
                                </div>
                            </div>
                            <!-- Phone Number Input Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Update User" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.panel_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>