<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Client Portal</title>

    <!-- Scripts -->
    <!-- <script language="JavaScript" type="text/javascript" src="/js/jquery.js"></script> -->
    <script language="JavaScript" type="text/javascript" src="/js/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/bootstrap.js"></script>
    <!-- <script language="JavaScript" type="text/javascript" src="/js/datatables.js"></script> -->
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <script language="JavaScript" type="text/javascript" src="/js/datatables.min.js"></script>

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- toastr -->
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- password strength checker -->
    <script src="{{ asset('js/pstrchecker.js') }}"></script>
    <script src="{{ asset('js/passwordStrength.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <!-- DATA TABLES -->
    <link href="css/datatables.min.css" rel="stylesheet">


    <script src="{{ asset('js/highstock.js') }}"></script>
    <script src="{{ asset('js/exporting.js') }}"></script>
    <script src="{{ asset('js/export-data.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/feather.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="z-index:1000;position: fixed;width: 100%;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('logo-final4.png') }}" alt="">
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <!-- <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li> -->
                        @else
                            <li class="nav-item dropdown">
                                @if (Auth::user()->role == 'client')
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i data-feather="user"class="blue-header"></i>  <span class="blue-header">{{Auth::user()->client->salutation}}. {{ Auth::user()->name }}</span> <span class="caret"></span>
                                </a>
                                @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i data-feather="user"class="blue-header"></i>  <span class="blue-header">Admin {{ Auth::user()->name }}</span> <span class="caret"></span>
                                </a>
                                @endif

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  @if (Auth::user()->role == 'client')
                                    <a class="dropdown-item" href="{{url('profile')}}">
                                        <span>Profile</span>
                                    </a>
                                  @else
                                    <a class="dropdown-item" href="{{url('settings')}}">
                                        <span>Admin Settings</span>
                                    </a>
                                  @endif


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @if (Auth::guest())

            @else
                @if (Auth::user()->role == 'client')
                  @include('partials.user.sidebar')
                @else
                  @include('partials.sidebar')
                @endif
            @endif
              @yield('content')
        </main>
    </div>


</body>
</html>

<script type="text/javascript">
@if(Session::has('message'))
  var type = "{{Session::get('alert-type', 'info')}}";

  switch (type)
  {
    case 'info':
        toastr.options = {
          "positionClass": "toast-bottom-right",
        }
        toastr.info("{{Session::get('message')}}");
        break;

    case 'success':
        toastr.options = {
          "positionClass": "toast-bottom-right",
        }
        toastr.success("{{Session::get('message')}}");
        break;

    case 'warning':
        toastr.options = {
          "positionClass": "toast-bottom-right",
        }
        toastr.warning("{{Session::get('message')}}");
        break;

    case 'error':
        toastr.options = {
          "positionClass": "toast-bottom-right",
        }
        toastr.error("{{Session::get('message')}}");
        break;

  }
@endif

feather.replace()

</script>
