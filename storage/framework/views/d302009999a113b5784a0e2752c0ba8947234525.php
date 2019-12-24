<!-- Sidebar Start here -->
<!-- <div class="wrapper"> -->
<div id="left">
    <div class="menu_scroll">
        <div class="media user-media">
            <div class="user-media-toggleHover">
                <span class="fa fa-user"></span>
            </div>
            <div class="user-wrapper">
                <a class="user-link" href="#">
                    <?php if(!empty(Auth::user()->image)): ?><img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="<?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?>"
                        src="<?php echo e(asset('/images/user/large/'.Auth::user()->image)); ?>"><?php else: ?>
                        <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="<?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?>"
                        src="<?php echo e(asset('/images/user/user.png')); ?>">
                        <?php endif; ?>
                    <p class="text-white user-info"><?php echo e(Auth::user()->first_name); ?></p>
                </a>
            </div>
        </div>
        <!-- #menu -->
        <ul id="menu">
            <!-- Dashboard -->
            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <li class="<?php echo e((request()->is('admin/dashboard')) ? 'active':''); ?>">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="link-title menu_hide">&nbsp;Dashboard</span>
                </a>
            </li>
            <?php endif; ?>
            <!-- /.Dashboard -->

            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- System Settings -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/system*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/system')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; System</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/system/options')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/options')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Site Options
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/contact-info')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/contact-info')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Contact info
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/robots.txt')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/robots.txt')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Robots.txt</span>
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/htaccess')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/htaccess')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; .htaccess</span>
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/custom-code')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/custom-code')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Custom Code</span>
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/terms-condition')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/terms-condition')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Terms & Conditions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.System Settings -->
            <?php endif; ?>

            <!-- User Management -->
            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <li class="dropdown_menu <?php echo e((request()->is('admin/user*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/user')); ?>">
                    <i class="fa fa-users"></i>
                    <span class="link-title menu_hide">&nbsp; User Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/user')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/user')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Users
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/user/role')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/user/role')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; User Roles
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/user/permission')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/user/permission')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; User Permissions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            <!-- /.User Management -->

            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- Page Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/pages*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/pages')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Page Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/pages*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/pages')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Pages
                        </a>
                    </li>
                    <!-- <li class="<?php echo e((request()->is('admin/page-category')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/page-category')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Page Category</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <!-- /.Page Management -->
            <?php endif; ?>

            <!-- Product Management -->
            <?php if(auth()->check() && auth()->user()->hasAnyRole('Super Admin|Seller')): ?>
            <li class="dropdown_menu <?php echo e((request()->is('admin/product*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/product')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Product Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <?php if(auth()->check() && auth()->user()->hasAnyRole('Super Admin|Seller')): ?>
                    <li class="<?php echo e((request()->is('admin/product')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/product')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Products
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                    <li class="<?php echo e((request()->is('admin/product-category*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/product-category')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Product Category</span>
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/product-vendor*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/product-vendor')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Product Seller</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <!-- /.Product Management -->

            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- Suppliers Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/supplier*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/supplier')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Supplier Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/supplier*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/supplier')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Suppliers
                        </a>
                    </li>
            </li>
            <li class="<?php echo e((request()->is('admin/supplier-category*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('admin/supplier-category')); ?>">
                    <i class="fa fa-angle-right"></i>
                    <span class="link-title"> &nbsp; Supplier Category</span>
                </a>
            </li>
        </ul>
        </li>
        <!-- /.Suppliers Management -->
        <?php endif; ?>

        <?php if(auth()->check() && auth()->user()->hasAnyRole('Super Admin|Buyer|Supplier|Seller')): ?>
        <!-- Support Center -->
        <li class="dropdown_menu <?php echo e((request()->is('admin/support*')) ? 'active':''); ?>">
            <a href="<?php echo e(url('/admin/supports')); ?>">
                <i class="fa fa-file-text-o"></i>
                <span class="link-title menu_hide">&nbsp; Support Center</span>
                <span class="fa arrow menu_hide"></span>
            </a>
            <ul>
                <?php if(auth()->check() && auth()->user()->hasAnyRole('Super Admin|Buyer|Seller')): ?>
                <li class="<?php echo e((request()->is('admin/support/product-query*')) ? 'active':''); ?>">
                    <a href="<?php echo e(url('admin/support/product-query')); ?>">
                        <i class="fa fa-angle-right"></i> &nbsp; Product Queries
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasAnyRole('Super Admin|Supplier')): ?>
                <li class="<?php echo e((request()->is('admin/support/supplier-query')) ? 'active':''); ?>">
                    <a href="<?php echo e(url('admin/support/supplier-query')); ?>">
                        <i class="fa fa-angle-right"></i> &nbsp; Supplier Queries
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                <li class="<?php echo e((request()->is('admin/support/contact-query')) ? 'active':''); ?>">
                    <a href="<?php echo e(url('admin/support/contact-query')); ?>">
                        <i class="fa fa-angle-right"></i> &nbsp; Contact Queries
                    </a>
                </li>
                <li class="<?php echo e((request()->is('admin/support/subscribers')) ? 'active':''); ?>">
                    <a href="<?php echo e(url('admin/support/subscribers')); ?>">
                        <i class="fa fa-angle-right"></i> &nbsp; Subscribers
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <!-- /.Support Center -->
        <?php endif; ?>
        </ul>
        <!-- /#menu -->
    </div>
</div>
<!-- /.Sidebar ends here --><?php /**PATH D:\GITHUB\Ecommerce-Laravel\resources\views/layouts/panel/panel_sidebar.blade.php ENDPATH**/ ?>