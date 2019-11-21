<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    System Settings
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
                    <div class="card-header">Contact Information</div>
                    <div class="card-body">

                        <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>

                        <form method="post" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            <?php echo csrf_field(); ?>
                            <!-- Email Address Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Email Address" class="col-form-label"><?php echo e(__('Email Address')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="email" id="email" name="email"
                                        class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(config('app.email')); ?>">
                                </div>
                            </div>
                            <!-- /.Email Address Input Field -->

                            <!-- Phone Number Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Phone Number" class="col-form-label"><?php echo e(__('Phone Number')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="phone" name="phone"
                                        class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(config('app.phone')); ?>">
                                </div>
                            </div>
                            <!-- /.Phone Number Input Field -->

                            <!-- Address Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Address" class="col-form-label"><?php echo e(__('Address')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <textarea name="address" id="address" rows="8"
                                        class="form-control"><?php echo e(config('app.address')); ?></textarea>
                                </div>
                            </div>
                            <!-- /.Address Field -->

                            <!-- Copyright Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Copyright" class="col-form-label"><?php echo e(__('Copyright')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <textarea name="copyright" id="copyright"
                                        class="form-control"><?php echo e(config('app.copyright')); ?></textarea>
                                </div>
                            </div>
                            <!-- Copyright Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Update" class="btn btn-primary pull-right">
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
<?php echo $__env->make('layouts.panel.panel_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\New-Ecom\resources\views/admin/system/contact_info.blade.php ENDPATH**/ ?>