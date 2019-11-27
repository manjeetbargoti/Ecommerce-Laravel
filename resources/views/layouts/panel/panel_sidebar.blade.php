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
                    <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                        src="{{ asset('admin/img/admin.jpg') }}">
                    <p class="text-white user-info">{{ Auth::user()->first_name }}</p>
                </a>
            </div>
        </div>
        <!-- #menu -->
        <ul id="menu">
            <!-- Dashboard -->
            <li class="{{ (request()->is('admin/dashboard')) ? 'active':'' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span class="link-title menu_hide">&nbsp;Dashboard</span>
                </a>
            </li>
            <!-- /.Dashboard -->

            <!-- System Settings -->
            <li class="dropdown_menu {{ (request()->is('admin/system*')) ? 'active':'' }}">
                <a href="{{ url('/admin/system') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; System</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/system/options')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/options') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Site Options
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/contact-info')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/contact-info') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Contact info
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/robots.txt')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/robots.txt') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Robots.txt</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/htaccess')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/htaccess') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; .htaccess</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/custom-code')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/custom-code') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Custom Code</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.System Settings -->

            <!-- User Management -->
            @hasanyrole('Super Admin')
            <li class="dropdown_menu {{ (request()->is('admin/user*')) ? 'active':'' }}">
                <a href="{{ url('/admin/user') }}">
                    <i class="fa fa-users"></i>
                    <span class="link-title menu_hide">&nbsp; User Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/user')) ? 'active':'' }}">
                        <a href="{{ url('admin/user') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Users
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/user/role')) ? 'active':'' }}">
                        <a href="{{ url('admin/user/role') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; User Roles
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/user/permission')) ? 'active':'' }}">
                        <a href="{{ url('admin/user/permission') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; User Permissions</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
            <!-- /.User Management -->

            <!-- Page Management -->
            <li class="dropdown_menu {{ (request()->is('admin/pages*')) ? 'active':'' }}">
                <a href="{{ url('/admin/pages') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Page Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/pages*')) ? 'active':'' }}">
                        <a href="{{ url('admin/pages') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Pages
                        </a>
                    </li>
                    <!-- <li class="{{ (request()->is('admin/page-category')) ? 'active':'' }}">
                        <a href="{{ url('admin/page-category') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Page Category</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <!-- /.Page Management -->

            <!-- Product Management -->
            <li class="dropdown_menu {{ (request()->is('admin/product*')) ? 'active':'' }}">
                <a href="{{ url('/admin/product') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Product Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/product')) ? 'active':'' }}">
                        <a href="{{ url('admin/product') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Products
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/product-category*')) ? 'active':'' }}">
                        <a href="{{ url('admin/product-category') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Product Category</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/product-vendor*')) ? 'active':'' }}">
                        <a href="{{ url('admin/product-vendor') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Product Vendor</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.Product Management -->

            <!-- Suppliers Management -->
            <li class="dropdown_menu {{ (request()->is('admin/supplier*')) ? 'active':'' }}">
                <a href="{{ url('/admin/supplier') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Supplier Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/supplier*')) ? 'active':'' }}">
                        <a href="{{ url('admin/supplier') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Suppliers
                        </a>
                    </li>
            </li>
            <li class="{{ (request()->is('admin/supplier-category*')) ? 'active':'' }}">
                <a href="{{ url('admin/supplier-category') }}">
                    <i class="fa fa-angle-right"></i>
                    <span class="link-title"> &nbsp; Supplier Category</span>
                </a>
            </li>
        </ul>
        </li>
        <!-- /.Suppliers Management -->

        <!-- Support Center -->
        <li class="dropdown_menu {{ (request()->is('admin/supports*')) ? 'active':'' }}">
            <a href="{{ url('/admin/supports') }}">
                <i class="fa fa-file-text-o"></i>
                <span class="link-title menu_hide">&nbsp; Support Center</span>
                <span class="fa arrow menu_hide"></span>
            </a>
            <ul>
                <li class="{{ (request()->is('admin/supports/product-queries')) ? 'active':'' }}">
                    <a href="{{ url('admin/supports/product-queries') }}">
                        <i class="fa fa-angle-right"></i> &nbsp; Product Queries
                    </a>
                </li>
                <li class="{{ (request()->is('admin/supports/supplier-queries')) ? 'active':'' }}">
                    <a href="{{ url('admin/supports/supplier-queries') }}">
                        <i class="fa fa-angle-right"></i> &nbsp; Supplier Queries
                    </a>
                </li>
            </ul>
        </li>
        <!-- /.Support Center -->
        </ul>
        <!-- /#menu -->
    </div>
</div>
<!-- /.Sidebar ends here -->