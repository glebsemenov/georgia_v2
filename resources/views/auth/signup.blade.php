<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/uikit.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/auth.layout/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Poiret+One" rel="stylesheet">

<!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/uikit.min.js"></script>
    <script>window.Laravel = <?php echo json_encode( [ 'csrfToken' => csrf_token(), ] ); ?></script>
</head>
<body>
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a style="font-family: Cormorant SC" href="/">{{ trans('signup.backToIndex') }}</a></li> {{-- Insert logo instead of text --}}
        </ul>
    </div>

    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li class="uk-active">
                <a href="/signin"><button class="uk-button uk-button-primary signin-btn">{{ trans('signup.signInButtonContent') }}</button></a>
            </li>
        </ul>
    </div>
</nav>

<br><br>

<div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <p class="title">{{ trans('signup.createAnAccount') }}</p>
    </div>
</div>

<br><br>
<div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <span>Зарегистрируйтесь и используйте сервис когда, где и на чем Вам удобно</span>
        <img src="/img/takeItAllWithYou.png" />

        <br><br><br>

        <span>Следите за нашими обновлениями в социальных сетях</span>
        <br><br>
        <span class="fa-stack fa-lg">
                <a href="#"><i class="fa fa-twitter fa-stack-1x social-i" style="color: #00b5dd; border-color: #00b5dd"></i></a>
            </span>
        <span class="fa-stack fa-lg">
                <a href="#"><i class="fa fa-instagram fa-stack-1x social-i" style="color: #8a3ab9; border-color: #8a3ab9"></i></a>
            </span>
        <span class="fa-stack fa-lg">
                <a href="#"><i class="fa fa-facebook fa-stack-1x social-i" style="color: #0259dd; border-color: #0259dd"></i></a>
            </span>
        <span class="fa-stack fa-lg">
                <a href="#"><i class="fa fa-youtube fa-stack-1x social-i" style="color: red; border-color: red"></i></a>
            </span>
        <span class="fa-stack fa-lg">
                <a href="#"><i class="fa fa-vk fa-stack-1x social-i" style="color: #307fdd; border-color: #307fdd"></i></a>
            </span>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body" style="margin-right: 15px">
            <form method="POST" action="{{ url('/signup') }}">
                {{ csrf_field() }}
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Электронная почта</label>
                        </div>
                        <div>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                <input class="uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="email" type="email" required autofocus>
                            </div>
                            @if( $errors->has('email') )
                                <span class="error-label">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Пароль</label>
                        </div>
                        <div>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input class="uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="password" type="text" pattern=".{6,15}" required>
                            </div>
                            @if( $errors->has('password') )
                                <span class="error-label">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Как Вы хотите использовать сервис</label>
                        </div>
                        <div>
                            <div class="uk-form-controls">
                                <select name="user_type_id" class="uk-select" id="form-horizontal-select">
                                    <option value="1">Я хочу отправиться в Грузию</option>
                                    <option value="2">У меня бизнес в Грузии и я хочу его продвигать</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="uk-divider-icon">

                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Имя и Фамилия</label>
                        </div>
                        <div>
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                        <input class="uk-input{{ $errors->has('fname') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="fname" type="text" placeholder="имя" required>
                                    </div>
                                    @if( $errors->has('fname') )
                                        <span class="error-label">{{ $errors->first('fname') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                        <input class="uk-input{{ $errors->has('lname') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="lname" type="text" placeholder="фамилия" required>
                                    </div>
                                    @if( $errors->has('lname') )
                                        <span class="error-label">{{ $errors->first('lname') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Пол</label>
                        </div>
                        <div>
                            <div class="uk-form-controls">
                                <select name="gender_id" class="uk-select" id="form-horizontal-select">
                                    <option value="1">женский</option>
                                    <option value="2">мужской</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Дата рождения</label>
                        </div>
                        <div>
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <input class="uk-input" id="form-horizontal-text" name="year" type="number" max="1999" min="1900" pattern="[0-9]" value="1900" placeholder="год">
                                    </div>
                                </div>
                                <div class="uk-width-1-4@s">
                                    <div class="uk-inline">
                                        <input class="uk-input" id="form-horizontal-text" name="month" type="number" max="12" min="1" pattern="[0-9]" value="1" placeholder="месяц">
                                    </div>
                                </div>
                                <div class="uk-width-1-4@s">
                                    <div class="uk-inline">
                                        <input class="uk-input" id="form-horizontal-text" name="day" type="number" max="31" min="1" pattern="[0-9]" value="1" placeholder="день">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button class="uk-button uk-button-danger" type="submit">Продолжить</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
 {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
    {{--Forgot Your Password?--}}
    {{--</a>--}}