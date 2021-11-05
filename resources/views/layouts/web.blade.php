<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('page_title', config('app.name').' - Especialistas en carga y distribución')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="@yield('page_title', config('app.name').' - Especialistas en carga y distribución')">
    <meta name="description"
        content="@yield('page_description', 'Roque Transport - Especialistas en carga y distribución')">
    <meta name="author" content="Roque Transport">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta property="fb:app_id" content="xxxx" /> --}}
    <link rel="canonical" href="@yield('canonical_url', url()->current() )" />
    <meta property="og:locale" content="es_PE" />
    <meta property="og:type" content="@yield('type', 'website' )" />
    <meta property="og:title"
        content="@yield('page_title', config('app.name').' - Especialistas en carga y distribución')" />
    <meta property="og:description"
        content="@yield('page_description', 'Roque Transport - Especialistas en carga y distribución' )" />
    <meta property="og:url" content="@yield('url', url()->current() )" />
    <meta property="og:site_name" content="Roque Transport" />
    <meta property="og:image" content="@yield('image', url('front/img/logo-roque.png') )" />
    @if(isset($nofollow))
    <meta name="robots" content="noindex, nofollow">
    @endif
    <link rel="icon" href="{{ asset('front/img/favicon.png') }}">

    <!-- Stylesheets -->
    {{-- <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}" /> --}}
    {{-- <link rel='stylesheet' href="{{ asset('front/owl-carousel/owl.carousel.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/masterslider/style/masterslider.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/masterslider/skins/default/style.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/color-blue.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/retina.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('front/css/app.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}" />

    <!-- Google Web fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,800,700,600'
        rel='stylesheet' type='text/css'>

    @yield('styles')

    <script type="text/javascript">
        function callbackThen(response){
            // read HTTP status
            console.log('Status :'+response.status)

            // read Promise object
            response.json().then(function(data){
                console.log(data);
                if(data.success == true && data.score > 0.5){
                    ishuman = true
                }
            });
        }
        function callbackCatch(error){
            console.error('Error:', error)
        }
    </script>
    {!! htmlScriptTagJsApi([
    'action' => 'validateishuman',
    // 'custom_validation' => 'myCustomValidation',
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch'
    ]) !!}
</head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MN2X3FG');</script>
<!-- End Google Tag Manager -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MN2X3FG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<body>
    @include('front.inc.header')
    @yield('content')
    @include('front.inc.footer')

    {{-- <script src="{{ asset('front/js/jquery-2.1.4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('front/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('front/js/jquery.srcipts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('front/owl-carousel/owl.carousel.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('front/masterslider/masterslider.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('front/js/jquery.dlmenu.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('front/js/include.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/toastr.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/validate/localization/messages_es_PE.min.js') }}"></script> --}}
    <script src="{{ asset('front/js/app.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>
