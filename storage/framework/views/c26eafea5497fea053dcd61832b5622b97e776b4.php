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
            <div class="col-xl-12 m-auto">
                <div class="card">
                    <div class="card-header">Create New user</div>
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

                        <form action="<?php echo e(url('admin/user')); ?>" method="post"
                            class="form-horizontal login_validator" enctype="multipart/form-data" id="form_inline_validator">
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
                                        <option value="<?php echo e($roles->name); ?>"><?php echo e($roles->name); ?></option>
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
                                        class="validate[required] form-control select2 <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        required value="<?php echo e(old('title')); ?>">
                                        <option value="">Select a Title</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Mrs.">Mrs.</option>
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
                                        value="<?php echo e(old('username')); ?>">
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
                                        value="<?php echo e(old('first_name')); ?>">
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
                                        value="<?php echo e(old('last_name')); ?>">
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
                                        value="<?php echo e(old('email')); ?>">
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
                                        value="<?php echo e(old('phone')); ?>">
                                </div>
                            </div>
                            <!-- Phone Number Input Field -->

                            <!-- Password Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="password" class="col-form-label"><?php echo e(__('Password *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required
                                        value="<?php echo e(old('password')); ?>">
                                </div>
                            </div>
                            <!-- /.Password Input Field -->

                            <!-- Confirm Password Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Confirm Password"
                                        class="col-form-label"><?php echo e(__('Confirm Password *')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="password" id="ConfirmPassword" name="confirmpassword"
                                        class="form-control <?php if ($errors->has('confirmpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('confirmpassword'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required
                                        value="<?php echo e(old('confirmpassword')); ?>">
                                </div>
                            </div>
                            <!-- /.Confirm Password Input Field -->

                            <!-- <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="date" class="col-form-label">Date *</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="date" class="form-control form_val_popup_dp4" name="dateofbirth"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Terms & Condition" class="col-form-label"></label>
                                </div>

                                <div class="col-xl-4">
                                    <div class="checkbox">
                                        <label class="text-primary">
                                            <input type="checkbox" name="terms" id="terms" value="I agree with the Terms and Conditions.">
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            I agree with the <a href="#">Terms and Conditions</a>.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Create User" class="btn btn-primary pull-right">
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
<?php echo $__env->make('layouts.panel.panel_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/admin/user/create.blade.php ENDPATH**/ ?>