<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>K-Hotel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    @yield('content')
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('resources/js/main.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
