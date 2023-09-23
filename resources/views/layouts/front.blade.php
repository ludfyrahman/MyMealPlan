<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from eduvibe.html.devsvibe.com/index-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Oct 2022 13:17:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}}</title>

    <link rel="icon" href="img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fe_assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/nice-select.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/icofont.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/slicknav.min.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('fe_assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('fe_assets/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('fe_assets/css/color/color1.css')}}">

    <link rel="stylesheet" id="colors">
    <link rel="stylesheet" href="{{ asset('fe_assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fe_assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fe_assets/css/style.css')}}">
</head>
<body>
    <div class="preloader">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
            <div class="indicator">
                <svg width="16px" height="12px">
                    <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                </svg>
            </div>
        </div>
    </div>
    <div class="color-plate">
        <a class="color-plate-icon"><i class="fa fa-cog fa-spin"></i></a>
        <h4>Mediplus</h4>
        <p>Here is some awesome color's available on Mediplus Template.</p>
        <span class="color1"></span>
        <span class="color2"></span>
        <span class="color3"></span>
        <span class="color4"></span>
        <span class="color5"></span>
        <span class="color6"></span>
        <span class="color7"></span>
        <span class="color8"></span>
        <span class="color9"></span>
        <span class="color10"></span>
        <span class="color11"></span>
        <span class="color12"></span>
    </div>
    @include('includes.frontend.header')
    @yield('content-app')

    @include('includes.frontend.footer')


    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>


    <script data-cfasync="false"
        src="https://wpthemesgrid.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('fe_assets/js/jquery.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/jquery-migrate-3.0.0.js')}}"></script>

    <script src="{{asset('fe_assets/js/easing.js')}}"></script>

    <script src="{{asset('fe_assets/js/colors.js')}}"></script>

    <script src="{{asset('fe_assets/js/popper.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/bootstrap-datepicker.js')}}"></script>

    <script src="{{asset('fe_assets/js/jquery.nav.js')}}"></script>

    <script src="{{asset('fe_assets/js/slicknav.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/jquery.scrollUp.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/niceselect.js')}}"></script>

    <script src="{{asset('fe_assets/js/tilt.jquery.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/owl-carousel.js')}}"></script>

    <script src="{{asset('fe_assets/js/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/steller.js')}}"></script>

    <script src="{{asset('fe_assets/js/wow.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDGqTyqoPIvYxhn_Sa7ZrK5bENUWhpCo0w"></script>

    <script src="{{asset('fe_assets/js/gmaps.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/map-active.js')}}"></script>

    <script src="{{asset('fe_assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('fe_assets/js/main.js')}}"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"7ff18fba6ff53f88","version":"2023.8.0","r":1,"b":1,"token":"3248e93e0d6447329c4d6bcc351d5700","si":100}'
        crossorigin="anonymous"></script>
</body>
</html>
