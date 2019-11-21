<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | <?php echo e(config('app.name')); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="favicon.png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--global styles-->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/components.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/custom.css')); ?>" />
    <!-- end of global styles-->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/c3/css/c3.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/toastr/css/toastr.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/izitoast/css/iziToast.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/switchery/css/switchery.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pages/new_dashboard.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pages/form_layouts.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/inputlimiter/css/jquery.inputlimiter.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/chosen/css/chosen.min.css')); ?>" />
    <link rel="stylesheet"
        href="<?php echo e(asset('admin/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/jquery-tagsinput/css/jquery.tagsinput.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/daterangepicker/css/daterangepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/multiselect/css/multi-select.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pages/form_elements.css')); ?>" />
    <!-- /.End of Global Styles -->
    <!--Plugin styles-->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/jquery-validation-engine/css/validationEngine.jquery.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/datetimepicker/css/DateTimePicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')); ?>" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pages/form_validations.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/multiselect/css/multi-select.css')); ?>"/>
    <!-- end of page level styles -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/checkbox_css/css/checkbox.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pages/radio_checkbox.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/select2/css/select2.min.css')); ?>" />


</head>

<body>

    <!-- Pre-Loader Starts here -->
    <div class="preloader" style=" position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 100000;
        backface-visibility: hidden;
        background: #ffffff;">
        <div class="preloader_img" style="width: 200px;
            height: 200px;
            position: absolute;
            left: 48%;
            top: 48%;
            background-position: center;
            z-index: 999999">
            <img src="<?php echo e(asset('admin/img/loader.gif')); ?>" style=" width: 40px;" alt="loading...">
        </div>
    </div>
    <!-- /.Pre-Loader End here -->

    <!-- Body wrap start here -->
    <div id="wrap">

        <?php echo $__env->make('layouts.panel.panel_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Wrapper Start here -->
        <div class="wrapper">
            <?php echo $__env->make('layouts.panel.panel_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content Section start here -->
            <div id="content" class="bg-container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- /.COntent section end here -->
        </div>
        <!-- /.Wrapper ends here -->

        <?php echo $__env->make('layouts.panel.panel_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!-- /.Body wrap ends here -->

    <!-- Scripts -->
    <!-- global scripts-->
    <script src="<?php echo e(asset('admin/js/components.js')); ?> "></script>
    <script src="<?php echo e(asset('admin/js/custom.js')); ?> "></script>
    <script src="<?php echo e(asset('admin/js/popper.min.js')); ?>"></script>
    <!-- global scripts end-->
    <script src="<?php echo e(asset('admin/vendors/raphael/js/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/d3/js/d3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/c3/js/c3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/toastr/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/switchery/js/switchery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flotchart/js/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flotchart/js/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flotchart/js/jquery.flot.stack.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flotchart/js/jquery.flot.time.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flotspline/js/jquery.flot.spline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flotchart/js/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flotchart/js/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/flot.tooltip/js/jquery.flot.tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/jquery_newsTicker/js/newsTicker.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/countUp.js/js/countUp.min.js')); ?>"></script>
    <!--end of plugin scripts-->
    <script src="<?php echo e(asset('admin/js/pages/new_dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/izitoast/js/iziToast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/pages/izi_toastr.js')); ?>"></script>

    <!--Plugin scripts-->
    <script src="<?php echo e(asset('admin/vendors/jquery-validation-engine/js/jquery.validationEngine.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/jquery-validation-engine/js/jquery.validationEngine-en.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/jquery-validation/js/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/datetimepicker/js/DateTimePicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/moment/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/multiselect/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/pages/radio_checkbox.js')); ?>"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script src="<?php echo e(asset('admin/js/form.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/pages/form_validation.js')); ?>"></script>
    <!-- end page level scripts -->
    <script src="<?php echo e(asset('admin/vendors/select2/js/select2.js')); ?>"></script>

</body>

</html><?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/layouts/panel/panel_design.blade.php ENDPATH**/ ?>