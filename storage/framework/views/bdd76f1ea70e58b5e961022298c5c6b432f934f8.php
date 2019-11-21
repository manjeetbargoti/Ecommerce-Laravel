<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo e(config('app.name')); ?></title>

    <link rel="shortcut icon" href="favicon.png" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/css/components.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/custom.css')); ?>" />
    <!--End of Global styles -->

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/css/sidebarmenu.css')); ?>">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script> -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!--Plugin styles-->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/wow/css/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pages/login1.css')); ?>" />

</head>

<body>
    <div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
        <div class="<?php echo e(asset('admin/preloader_img')); ?>" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
            <img src="<?php echo e(asset('admin/img/loader.gif')); ?>" style=" width: 40px;" alt="loading...">
        </div>
    </div>

    <div class="wrapper">

        <?php echo $__env->make('layouts.front.front_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Content start -->
        <div id="content">
            <?php echo $__env->make('layouts.front.header.front_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /.Page Content end -->

        <?php echo $__env->make('layouts.front.front_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="<?php echo e(asset('admin/js/jquery.min.js')); ?>"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script> -->
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>

    <!--Plugin js-->
    <script src="<?php echo e(asset('admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/wow/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/pages/login1.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/pages/register.js')); ?>"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
    </script>
    <script>
    function userTypeCheck() {
        if (document.getElementById('IfLawyer').checked) {
            document.getElementById('IfLawyerCheck').style.display = 'none';
        } else document.getElementById('IfLawyerCheck').style.display = 'block';
    }
    </script>
</body>

</html><?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/layouts/front/front_design.blade.php ENDPATH**/ ?>