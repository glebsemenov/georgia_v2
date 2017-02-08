<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('index.title') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Cormorant+SC|Kurale|Poiret+One|Arsenal" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/uikit.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/property/styles.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/uikit.min.js"></script>
    <script>window.Laravel = <?php echo json_encode( [ 'csrfToken' => csrf_token(), ] ); ?></script>
</head>
<body>

<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a class="navbar-brand" style="font-family: Cormorant SC" href="{{ url('/') }}">Вернуться на главную</a></li> {{-- todo: Insert logo instead of text --}}
        </ul>
    </div>

    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            @if( Auth::guest() )
                <li class="uk-active">
                    <a href="/signup">
                        <button class="uk-button uk-button-primary nav-font">{{ trans('signup.signUpButtonContent') }}</button>
                    </a>
                </li>
            @else
                <li>
                    <a href="#">{{ Auth::user()->email }}</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            @if( \App\Http\Controllers\PropertyController::isUserHasProperty( Auth::user()->id ) )
                                <li class="uk-active">
                                    <a href="{{ url('/property/manage') }}"> Управление отелем</a>
                                </li>
                            @elseif( Auth::user()->user_type_id == 2 )
                                <li class="uk-active">
                                    <a href="{{ url('/property/register') }}"> Добавить отель</a>
                                </li>
                            @endif
                            <li class="uk-active">
                                <a href="{{ url('/signout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ url('/signout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>

@yield('content')

</body>
</html>
