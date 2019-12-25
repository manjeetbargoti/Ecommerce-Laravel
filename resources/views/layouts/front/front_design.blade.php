<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('/images/logo/'.config('app.favicon')) }}" />

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('front/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/magnific-popup/magnific-popup.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('front/css/heroic-features.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/product-style.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="fonts/Cinzel/Cinzel-Regular.otf">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">


</head>

<body class="d-flex flex-column bg-images"  style="background-repeat:no-repeat; background-image:100%; background-size: cover;transition: 0.5s;">
    <div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
        <div class="{{ asset('admin/preloader_img') }}" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
            <img src="{{ asset('admin/img/loader.gif') }}" style=" width: 40px;" alt="loading...">
        </div>
    </div>



    <!-- Page Content start -->
    <!-- <div id="content"> -->
    @include('layouts.front.header.front_header')

    @yield('content')
    <!-- </div> -->
    <!-- /.Page Content end -->

    @include('layouts.front.front_footer')



    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/plugins/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/plugins/magnific-popup/jquery.magnific.popup.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
    <script src="{{ asset('front/js/main.js') }}"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script> -->
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>

    <!--Plugin js-->
    <script src="{{ asset('admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/wow/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/login1.js') }}"></script>
    <script src="{{ asset('admin/js/pages/register.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

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

    <script type="text/javascript">
    var typed = new Typed(".vvvLux-typed2", {
        strings: [
            "Beyond Luxury"
        ],
        typeSpeed: 50, // Default value
        backSpeed: 50,
        loop: true,
    });

    var typed = new Typed(".vvvLux-typed", {
        strings: [
            "Timeless and Valuable"
        ],
        typeSpeed: 50, // Default value
        backSpeed: 50,
        loop: true,
    });

    var typed = new Typed(".vvvLux-typed3", {
        strings: [
            "Test 1"
        ],
        typeSpeed: 50, // Default value
        backSpeed: 50,
        loop: true,
    });

    var typed = new Typed(".vvvLux-type4", {
        strings: [
            "Test 2"
        ],
        typeSpeed: 50, // Default value
        backSpeed: 50,
        loop: true,
    });
    </script>

    <script>
    // function supplierCheck() {
    $('input:radio').click(function() {
        if ($(this).val() == 'Supplier' || $(this).val() == 'Seller') {
            $('#IfSupplierCheck').removeClass('d-none').addClass('d-block');
        } else {
            $('#IfSupplierCheck').removeClass('d-block').addClass('d-none');
        }
    });
    // }
    </script>

    <!-- Notification -->
    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
    </script>

<script>
    // Check Username
    $('#UserName').blur(function() {
        var error_username = '';
        var username = $('#UserName').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_]{3,20})+$/;
        if (!filter.test(username)) {
            $('#error_username').html(
                '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Invalid Username</label>'
            );
            $('#UserName').addClass('has-error');
        } else {
            $.ajax({
                url: "{{ url('/valid/checkusername') }}",
                method: "POST",
                data: {
                    username: username,
                    _token: _token
                },
                success: function(result) {
                    if (result == 'unique') {
                        $('#error_username').html(
                            '<label class="text-success"><i class="fa fa-check"></i> Username Available</label>'
                        );
                        $('#UserName').removeClass('has-error');
                    } else {
                        $('#error_username').html(
                            '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Username already exist.</label>'
                        );
                        $('#UserName').addClass('has-error');
                    }
                }
            })
        }
    });

    // Check User Email
    $('#email').blur(function() {
        var error_email = '';
        var email = $('#email').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            $('#error_email').html(
                '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Invalid Email</label>');
            $('#email').addClass('has-error');
        } else {
            $.ajax({
                url: "{{ url('/valid/checkemail') }}",
                method: "POST",
                data: {
                    email: email,
                    _token: _token
                },
                success: function(result) {
                    if (result == 'unique') {
                        $('#error_email').html(
                            '<label class="text-success"><i class="fa fa-check"></i> Email Available</label>'
                        );
                        $('#email').removeClass('has-error');
                    } else {
                        $('#error_email').html(
                            '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Email already exist.</label>'
                        );
                        $('#email').addClass('has-error');
                    }
                }
            })
        }
    });
    </script>

</body>

</html>