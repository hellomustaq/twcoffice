<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ (getOption('company_name') ? getOption('company_name') : 'BD SOFT IT') }} | @yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title -->
    <title>BD SOFT IT | Construction</title>
    <!--Fevicon-->
    @php
        $settings = \App\Models\Settings::orderby('created_at', 'desc')->first();
    @endphp

    <link rel="icon" href="{{ asset($settings->icon_img) }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

{{--    <link rel="preload" href="{{ asset('rmm/manifest.js') }}" as="script">--}}
{{--    <link rel="preload" href="{{ asset('rmm/vendor.js') }}" as="script">--}}
{{--    <link rel="preload" href="{{ asset('rmm/app.js') }}" as="script">--}}
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('files/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/feather/css/feather.css')}}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/font-awesome-n.min.css')}}">
    <!-- Chartlist chart css -->
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/widget.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/autoFill.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/all.css')}}" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/toastr.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />--}}
{{--    <link href="https://cdn.datatables.net/autofill/2.3.3/css/autoFill.dataTables.min.css" rel="stylesheet" />--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">--}}
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">--}}

    {{-- toastr --}}
{{--    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}

    <style>
        .red{
            color: red;
        }

        @if(Auth::user()->isAdmin())

        .pcoded .pcoded-navbar[navbar-theme="theme1"] .nav-user, .pcoded .pcoded-navbar[navbar-theme="theme1"] .pcoded-inner-navbar {
            background-color: #00695C!important;
        }

        .header-navbar .navbar-wrapper .navbar-logo[logo-theme="theme6"] {
            background: #00695C!important;
        }
        .pcoded[theme-layout="vertical"] .pcoded-navbar[navbar-theme="theme1"][active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger>a {
            background: #00695C!important;
            /* color: #b7c0cd; */
        }
        @elseif(Auth::user()->isAccountant())
        .pcoded .pcoded-navbar[navbar-theme="theme1"] .nav-user, .pcoded .pcoded-navbar[navbar-theme="theme1"] .pcoded-inner-navbar {
            background-color: #384f65 !important;
        }

        .header-navbar .navbar-wrapper .navbar-logo[logo-theme="theme6"] {
            background: #384f65 !important;
        }
        .pcoded[theme-layout="vertical"] .pcoded-navbar[navbar-theme="theme1"][active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger>a {
            background: #384f65 !important;
            /* color: #b7c0cd; */
        }
        @else
        .pcoded .pcoded-navbar[navbar-theme="theme1"] .nav-user, .pcoded .pcoded-navbar[navbar-theme="theme1"] .pcoded-inner-navbar {
            background-color: #003c67!important;
        }

        .header-navbar .navbar-wrapper .navbar-logo[logo-theme="theme6"] {
            background: #003c67!important;
        }
        .pcoded[theme-layout="vertical"] .pcoded-navbar[navbar-theme="theme1"][active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger>a {
            background: #003c67!important;
            /* color: #b7c0cd; */
        }
        @endif

        .pcoded .pcoded-navbar[navbar-theme="theme1"] .pcoded-item>li>a {
            color: #ffffff!important;
        }

        .pcoded-main-container {
            background-size: cover;
            background-position: top center;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .select2-selection__choice{
            float: none !important;
            display: inline-block !important;
        }


    </style>
    @yield('style')
<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
{{--    <script src="{{ asset('files/assets/js/html5shiv.js' }}"></script>--}}
{{--    <script src="{{ asset('files/assets/js/respond.min.js' }}"></script>--}}
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #footer {
            position: fixed;
            text-align: right !important;
            bottom: 0;
            width: 100%;
            right: 0;
            background: #00695c;
            color: #fff;
            padding: 5px 25px 5px 5px   ;
            font-size: 12px;
        }

        #footer a {
            color: #f5c40c;
            font-weight: 600;
        }
    </style>
</head>

<body>
<div id="app" >
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('layouts.header')


            <div class="pcoded-main-container" id="mainBG" style="background-image: url('{{ getOption('background_image') ? '/uploads/public/cache/original/' . getOption('background_image') : asset("images/backg.jpg") }}')">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                @include('layouts.left-nav')
                <!-- [ navigation menu ] end -->
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->

                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        @if (session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <!-- [ page content ] start -->
                                    @yield('content')
                                    <!-- [ page content ] end -->
                                    </div>
                                </div>
                            </div>

                            <div id="footer">
                                Developed & Maintained by:
                                <a href="https://bdsoftit.com" target="_blank" title="Your Dream Tech Innovator">BD SOFT IT</a>
                            </div>
                        </div>
                    </div>
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->
</div>
<!-- Required Jquery -->

<script type="text/javascript" src="{{ asset('rmm/manifest.js') }}"></script>
<script type="text/javascript" src="{{ asset('rmm/vendor.js') }}"></script>
<script type="text/javascript" src="{{ asset('rmm/app.js') }}"></script>
{{--<script type="text/javascript" src="{{asset('files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>--}}
<!-- waves js -->
<script src="{{asset('files/assets/pages/waves/js/waves.min.js')}}" type="text/javascript"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('files/assets/js/pcoded.min.js')}}" type="text/javascript"></script>
<script src="{{asset('files/assets/js/vertical/vertical-layout.min.js')}}" type="text/javascript"></script>
{{-- <script type="text/javascript" src="{{asset('files/assets/pages/dashboard/custom-dashboard.min.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('files/assets/js/script.min.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

{{--<script src="{{ asset('files/assets/js/rocket-loader.min.js' }}" data-cf-settings="49" defer=""></script>--}}
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="49" defer=""></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
{{-- tostr and sweet alert --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
        @if(Session::has('message'))
        let type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- fix date input in all browser --}}
<script src="https://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="https://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
    webshims.setOptions('waitReady', false);
    webshims.setOptions('forms-ext', {type: 'date'});
    webshims.setOptions('forms-ext', {type: 'time'});
    webshims.polyfill('forms forms-ext');
</script>
<script src="{{ asset('js/bd_soft_it.js') }}"></script>

@yield('script')

</body>

</html>

sudo apt install php7.3 libapache2-mod-php7.3 php7.3-mbstring php7.3-xmlrpc php7.3-soap php7.3-gd php7.3-xml php7.3-cli php7.3-zip
