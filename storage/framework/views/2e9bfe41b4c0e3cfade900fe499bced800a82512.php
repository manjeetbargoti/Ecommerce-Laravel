<?php $__env->startSection('content'); ?>
<style>
body {
    background-image: url(../../admin/img/login.jpg) !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: inherit !important;
}
</style>
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 login_top_bottom">
            <div class="row">
                <div class="col-lg-5  col-md-8  col-sm-12 mx-auto">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="<?php echo e(asset('admin/img/logow2.png')); ?>" alt="<?php echo e(config('app.name')); ?> logo"
                                class="admire_logo"><span class="text-white">
                                <?php echo e(config('app.name')); ?> &nbsp;<br />
                                Log In</span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <form action="<?php echo e(route('login')); ?>" id="login_validator" method="post" class="login_validator">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="email" class="col-form-label"> <?php echo e(__('E-Mail Address')); ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                            class="fa fa-envelope text-primary"></i></span>
                                    <input id="email" type="email" name="email"
                                        class="form-control  form-control-md <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="email" name="username" value="<?php echo e(old('email')); ?>" placeholder="E-mail"
                                        required autocomplete="email" autofocus>
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
                            <!--</h3>-->
                            <div class="form-group">
                                <label for="password" class="col-form-label"><?php echo e(__('Password')); ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                            class="fa fa-lock text-primary"></i></span>
                                    <input id="password" type="password"
                                        class="form-control form-control-md <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="password" name="password" required autocomplete="current-password"
                                        placeholder="Password">
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
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="<?php echo e(__('Login')); ?>"
                                            class="btn btn-primary btn-block login_button">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" id="remember"
                                            <?php echo e(old('remember') ? 'checked' : ''); ?>

                                            class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description"><?php echo e(__('Keep me logged in')); ?></a>
                                    </label>
                                </div>
                                <div class="col-6 text-right forgot_pwd">
                                    <?php if(Route::has('password.request')): ?>
                                    <a href="<?php echo e(route('password.request')); ?>"
                                        class="custom-control-description forgottxt_clr"><?php echo e(__('Forgot Password?')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm m-t-10">
                                    <div class="icon-white btn-facebook icon_padding loginpage_border">
                                        <i class="fa fa-facebook"></i>
                                        <span class="text-white icon_padding text-center question_mark">Log In With
                                            Facebook</span>
                                    </div>
                                </div>
                                <div class="col-sm m-t-10">
                                    <div class="icon-white btn-google icon_padding loginpage_border">
                                        <i class="fa fa-google-plus"></i>
                                        <span class="text-white icon_padding question_mark">Log In With
                                            Google+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Don't you have an Account? </label>
                            <a href="<?php echo e(route('register')); ?>" class="text-primary"><b>Sign Up</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\New-Ecom\resources\views/auth/login.blade.php ENDPATH**/ ?>