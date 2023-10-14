<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-items/hotel-alpha/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 11:21:21 GMT -->

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TFC5925');
    </script>
    <!-- End Google Tag Manager -->
    <title>K Hotel - Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/bootstrap-submenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('hotel-alpha/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/bootstrap-datepicker.min.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet"
        href="{{ asset('hotel-alpha/css/skins/blue-light-2.css') }}">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('hotel-alpha/css/ie10-viewport-bug-workaround.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('hotel-alpha/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    @stack('styles')
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="{{ asset('"https://www.googletagmanager.com/ns.html?id=GTM-TFC5925')}}" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('components.customer.header')

    @include('components.customer.main_header')

    @yield('content')

    @include('components.customer.footer')

    <script  src="{{ asset('hotel-alpha/js/jquery-2.2.0.min.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/bootstrap.min.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/bootstrap-submenu.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/jquery.mb.YTPlayer.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/wow.min.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/bootstrap-select.min.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/jquery.easing.1.3.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/jquery.scrollUp.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/jquery.filterizr.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/bootstrap-datepicker.min.js') }}"></script>
    <script  src="{{ asset('hotel-alpha/js/app.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script  src="{{ asset('hotel-alpha/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- Custom javascript -->
    <script src="{{ asset('resources/js/main.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
    </script>

    @stack('scripts')

    @include('sweetalert::alert')
</body>

<!-- Mirrored from storage.googleapis.com/themevessel-items/hotel-alpha/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 11:21:29 GMT -->

</html>
