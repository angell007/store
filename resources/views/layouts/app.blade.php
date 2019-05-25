
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trystore</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="shortcut icon" href="src/images/fav_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.4-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.4/css/bulma.min.css" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	{{-- <script src="plotly-latest.min.js"></script> --}}
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-1.2.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">

    <script src="{{ asset('css/bulma.css') }}" defer></script>

    <style type="text/css">
        html,
        body {
            font-family: 'Open Sans';
        }
        img {
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>
            <script>
                    window.Laravel = {!! json_encode([
                        'csrfToken' => csrf_token(),
                    ]) !!};
                </script>
</head>

<body>
    {{-- <section class="hero is-fullheight is-default is-bold"> --}}
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="src/">
                            <img src="/img/logo-udi-web.png" alt="Logo">
                        </a>
                        <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
                    </div>
                    {{-- @include('includes.header') --}}
                    {{-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> --}}
                        <div id="navbarMenu" class="navbar-menu">
                            <div class="navbar-end">
                                {{-- <div class="tabs is-right"> --}}
                                    <ul class="nav navbar-nav navbar-right">
                                    
                                    {{-- <li class="is-active"><a>Home</a></li> --}}
                                   {{-- <li class="is-active"><a href="/home">Inicio</a></li> --}}
                                    @if(Auth::user())    
                                    {{-- <li><a href="{{ route('account') }}">Account</a></li> --}}
                                    {{-- <ul class="dropdown-menu"> --}}
                                                      
                                            <li class="dropdown">
                                                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                        
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        {{-- </div> --}}
                                            </li>
            
                                        
                                        {{-- </ul> --}}
                                    <li >
                                            <a href="{{ route('post.index') }}" >
                                                Post 
                                            </a>

                                    </li>   
                                    <li >
                                            <a href="{{ route('dashboard') }}" >
                                                dashboard 
                                            </a>

                                    </li> 

                                    @endif
                                </ul>
                            {{-- </div> --}}
                        </div>
                    </div> 
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns is-vcentered is-12" >

                        {{-- <div class="hero-foot">
                                <div class="container">
                                    <div class="tabs is-centered"> --}}
                    
                                        @yield('content')
{{--                                         
                                        </div>
                                    </div>
                                </div> --}}
                </div>
            </div>
        </div>
        </div>
    {{-- </section> --}}
    <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <div class="soc">
                        {{-- <a href="#"><i class="fa fa-github-alt fa-2x" aria-hidden="true"></i></a> --}}
                        <a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                    </div>
                    <p>
                        <strong>© 2019 TryStore, Inc.</strong> by <a href="http://jgthms.com">TryStore Team</a>.
                        The source code is licensed <a href="#"> </a>. <br>
                    </p>
                </div>
            </div>
        </footer>
    <script src="/js/bulma.js"></script>
</body>

</html>
