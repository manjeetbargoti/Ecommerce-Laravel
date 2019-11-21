<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-align-justify"></i>
            <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <span style="font-size:2em;font-weight:400;"> &nbsp;<?php echo e(config('app.name')); ?></span>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if(Route::has('login')): ?>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">How it works</a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a> -->
                </li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
<!-- /.Top Navbar --><?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/layouts/front/header/front_header.blade.php ENDPATH**/ ?>