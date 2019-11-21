<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | <?php echo e(config('app.name')); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/logo1.ico" />
    <!--global styles-->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/components.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/custom.css')); ?>" />
    <!-- end of global styles-->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/c3/css/c3.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/toastr/css/toastr.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/switchery/css/switchery.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/pages/new_dashboard.css')); ?>" />
    <link rel="stylesheet" href="#" id="skin_change" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> -->
    <!-- global scripts-->
    <script src="<?php echo e(asset('admin/js/components.js')); ?> "></script>
    <script src="<?php echo e(asset('admin/js/custom.js')); ?> "></script>
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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> -->
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
            <img src="img/loader.gif" style=" width: 40px;" alt="loading...">
        </div>
    </div>
    <!-- /.Pre-Loader End here -->

    <!-- Main Body Start here -->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <!-- /.Main body end here -->
</body>
</html>
<?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/layouts/app.blade.php ENDPATH**/ ?>