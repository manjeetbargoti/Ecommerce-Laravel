<?php $__env->startSection('content'); ?>
<style>
body {
    background-image: url(../../admin/img/login.jpg) !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: inherit !important;
}
</style>
<div class="container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="row login_top_bottom">
        <div class="col-12 mx-auto">
            <div class="row">
                <div class="col-lg-8 col-sm-12  col-md-8 mx-auto">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="<?php echo e(asset('admin/img/logow2.png')); ?>" alt="<?php echo e(config('app.name')); ?> logo"
                                class="admire_logo"><span class="text-white">
                                <?php echo e(config('app.name')); ?><br />
                                <?php echo e(__('Register')); ?></span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <!-- Register Form Start here -->
                        <form class="form-horizontal login_validator m-b-20" id="register_valid"
                            action="<?php echo e(url('/user/register')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="common" id="Common">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label"><?php echo e(__('You are?')); ?></label>
                                    </div>
                                    <?php $__currentLoopData = Spatie\Permission\Models\Role::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-3 col-12">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" id="If<?php echo e($roles->name); ?>" name="roles"
                                                onclick="javascript:userTypeCheck();" value="<?php echo e($roles->name); ?>"
                                                class="custom-control-input form-control <?php if ($errors->has('roles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('roles'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                >
                                            <span class="custom-control-indicator"></span>
                                            <a class="custom-control-description"><?php echo e($roles->name); ?></a>
                                        </label>
                                        <?php if ($errors->has('roles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('roles'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="client_form agentForm" id="ifLawyerCheck" style="display:block;">
                                <div class="form-group row">
                                    <!-- Title field -->
                                    <div class="col-sm-6">
                                        <label for="title" class="col-form-label"><?php echo e(__('Title *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-get-pocket text-primary"></i>
                                            </span>
                                            <select type="text"
                                                class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="title"
                                                value="<?php echo e(old('title')); ?>" required id="title">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                            </select>

                                            <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.Title field -->
                                    <!-- Username field -->
                                    <div class="col-sm-6">
                                        <label for="username" class="col-form-label"><?php echo e(__('Username *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-user-circle-o text-primary"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                name="username" value="<?php echo e(old('username')); ?>" required id="username"
                                                placeholder="Username">

                                            <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.Username field -->
                                </div>
                                <div class="form-group row">
                                    <!-- First Name field -->
                                    <div class="col-sm-6">
                                        <label for="first name" class="col-form-label"><?php echo e(__('First Name *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                name="first_name" value="<?php echo e(old('first_name')); ?>" required
                                                autocomplete="first_name" id="first_name" placeholder="First Name">

                                            <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.First Name field -->
                                    <!-- Last Name field -->
                                    <div class="col-sm-6">
                                        <label for="last name" class="col-form-label"><?php echo e(__('Last Name *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-user-plus text-primary"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                name="last_name" value="<?php echo e(old('last_name')); ?>" required
                                                autocomplete="last_name" id="last_name" placeholder="Last Name">

                                            <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.Last Name field -->
                                </div>
                                <div class="form-group row">
                                    <!-- Email Address field -->
                                    <div class="col-sm-6">
                                        <label for="email" class="col-form-label"><?php echo e(__('Email Address *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope text-primary"></i>
                                            </span>
                                            <input type="email" placeholder="Email Address" name="email" id="email"
                                                class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                value="<?php echo e(old('email')); ?>" required autocomplete="email" />

                                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.Email Address field -->
                                    <!-- Phone number field -->
                                    <div class="col-sm-6">
                                        <label for="phone" class="col-form-label"><?php echo e(__('Phone *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone text-primary"></i>
                                            </span>
                                            <input type="tel" id="phone" placeholder="Phone Number" name="phone"
                                                class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                value="<?php echo e(old('phone')); ?>" required autocomplete="phone" />

                                            <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.Phone number field -->
                                </div>
                                <div class="form-group row">
                                    <!-- Password field -->
                                    <div class="col-sm-6">
                                        <label for="password"
                                            class="col-form-label text-sm-right"><?php echo e(__('Password *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key text-primary"></i>
                                            </span>
                                            <input type="password" placeholder="Password" id="password" name="password"
                                                class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required />

                                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.Password Field -->
                                    <!-- Confirm Password field -->
                                    <div class="col-sm-6">
                                        <label for="confirmpassword"
                                            class="col-form-label"><?php echo e(__('Confirm Password *')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key text-primary"></i>
                                            </span>
                                            <input type="password" placeholder="Confirm Password" name="confirmpassword"
                                                id="confirmpassword"
                                                class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required />

                                            <?php if ($errors->has('confirmpassword')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('confirmpassword'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.Confirm Password field -->
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input form-control"
                                                name="terms" id="Terms">
                                            <span class="custom-control-indicator"></span>
                                            <span href="#" class="custom-control-description">I agree with the <a
                                                    href="#" style="text-decoration:underline;">Terms and
                                                    Conditions</a>.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="reset" class="btn btn-danger btn-lg pull-left">Reset</button>
                                        <input type="submit" value="Submit" class="btn btn-primary btn-lg pull-right" />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <label class="col-form-label">Already have an account?</label> <a
                                        href="<?php echo e(route('login')); ?>" class="text-primary login_hover"><b>Log
                                            In</b></a>
                                </div>
                            </div>
                        </form>
                        <!-- /.Register form ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\New-Ecom\resources\views/auth/register.blade.php ENDPATH**/ ?>