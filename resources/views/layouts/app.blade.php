<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('front/img/favicon.png') }}">
    <title>{{ config('app.name') }} | Administrador</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles b4 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--  Toastr  -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css')}}">
    <!--  Fontawesome  -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <!--  Dropify -->
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css')}}">

    <style>
        label.is-invalid {
            color: red;
        }
    </style>

    @yield('styles')

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else

                        <!-- admin  -->
                        @if(Auth::user()->role == 1)
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false" aria-haspopup="true">Recursos <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('images.index') }}" class="dropdown-item"><i class="fa fa-fw fa-picture-o"
                                        aria-hidden="true"></i> Multimedia</a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false" aria-haspopup="true">Blog <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('posts.index') }}"><i class="fa fa-book"></i> Artículos</a>
                                <a class="dropdown-item" href="{{ route('posts.create') }}"><i class="fa fa-plus"></i> Nuevo artículo</a>
                            </div>
                        </li>
                        @endif
                        <!-- fin admin -->

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Validate -->
    <script src="{{ URL::asset('js/validate/jquery.validate.min.js')}}"></script>
    <script src="{{ URL::asset('js/validate/additional-methods.min.js')}}"></script>
    <script src="{{ URL::asset('js/validate/localization/messages_es_PE.min.js')}}"></script>
    <!--chat.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <!--  toastr-->
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <!-- dropify-->
    <script src="{{ URL::asset('js/dropify.min.js')}}"></script>

    <script>
        $.ajaxSetup({
             headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') }
         });

        function friendly_url(str,max) {
            if (max === undefined) max = 1000;
            var a_chars = new Array(
                new Array("a",/[áàâãªÁÀÂÃ]/g),
                new Array("e",/[éèêÉÈÊ]/g),
                new Array("i",/[íìîÍÌÎ]/g),
                new Array("o",/[òóôõºÓÒÔÕ]/g),
                new Array("u",/[úùûÚÙÛ]/g),
                new Array("c",/[çÇ]/g),
                new Array("n",/[Ññ]/g)
            );
            // Replace vowel with accent without them
            for(var i=0;i<a_chars.length;i++)
                str = str.replace(a_chars[i][1],a_chars[i][0]);
            // first replace whitespace by -, second remove repeated - by just one, third turn in low case the chars,
            // fourth delete all chars which are not between a-z or 0-9, fifth trim the string and
            // the last step truncate the string to 32 chars
            return str.replace(/\s+/g,'-').toLowerCase().replace(/[^a-z0-9\-]/g, '').replace(/\-{2,}/g,'-').replace(/(^\s*)|(\s*$)/g, '').substr(0,max);
        }

         //toastr
         toastr.options = {
             "closeButton": false,
             "debug": false,
             "newestOnTop": true,
             "progressBar": false,
             "positionClass": "toast-top-right",
             "preventDuplicates": true,
             "onclick": null,
             "showDuration": "300",
             "hideDuration": "1000",
             "timeOut": "5000",
             "extendedTimeOut": "1000",
             "showEasing": "swing",
             "hideEasing": "linear",
             "showMethod": "fadeIn",
             "hideMethod": "fadeOut",
             "tapToDismiss": true
         }
    </script>

    @yield('scripts')

    <script type="text/javascript">
        //Code for show success  messages
         @if( @Session::has('success') )
         toastr.success('{{ @Session::get('success') }}');
         @endif
    </script>
    <script type="text/javascript">
        //Code for show warning  messages
         @if( @Session::has('warning') )
         toastr.warning('{{ @Session::get('warning') }}');
         @endif
    </script>
    <script type="text/javascript">
        //Code for show back an error message
         @if(session('error'))
         toastr.error('{{ session('error') }}');
         @endif

         //Code for show back validation error messages
         @if (@Session::has('errors'))
             @foreach ($errors->all() as $error)
         toastr.error('{{ @$error }}');
         @endforeach
         @endif
    </script>
</body>

</html>
