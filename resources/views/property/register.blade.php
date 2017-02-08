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
</nav>

<br><br>

@if ( \Session::has( 'success' ) )
    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{!! \Session::get('success')[0] !!}</p>
        </div>
    </div>
@elseif ( \Session::has( 'failure' ) )
    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{!! \Session::get('failure') !!}</p>
        </div>
    </div>
@endif

<div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <p class="title">Зарегистрировать отель</p>
    </div>
</div>

<br><br>
<div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <span>Зарегистрируйте отель и получайте клиентов</span>
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
            <form method="POST" action="{{ url('/property/register') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Электронная почта отеля</label>
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
                            <label class="uk-form-label" for="form-horizontal-text">Город</label>
                        </div>
                        <div>
                            <div class="uk-form-controls">
                                <select name="city" class="uk-select" id="form-horizontal-select">
                                    @for( $i = 0, $count = count( $cities ); $i < $count; ++$i )
                                        <option value="{{ $cities[$i]->id }}">{{ $cities[$i]->title_ru }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Улица</label>
                        </div>
                        <div>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input placeholder="на русском языке" class="uk-input{{ $errors->has('address_ru') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="address_ru" type="text" pattern=".{6,32}" required>
                            </div>
                            @if( $errors->has('address_ru') )
                                <span class="error-label">{{ $errors->first('address_ru') }}</span>
                            @endif
                            <div style="margin-top: 5px" class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input placeholder="на английском языке" class="uk-input{{ $errors->has('address_en') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="address_en" type="text" pattern=".{6,32}" required>
                            </div>
                            @if( $errors->has('address_en') )
                                <span class="error-label">{{ $errors->first('address_en') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Звезды</label>
                        </div>
                        <div>
                            <div class="uk-form-controls">
                                <select name="stars" class="uk-select" id="form-horizontal-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="uk-divider-icon">

                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Название</label>
                        </div>
                        <div>
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                        <input class="uk-input{{ $errors->has('name_ru') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="name_ru" type="text" placeholder="по-русски" required>
                                    </div>
                                    @if( $errors->has('name_ru') )
                                        <span class="error-label">{{ $errors->first('name_ru') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                        <input class="uk-input{{ $errors->has('name_en') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="name_en" type="text" placeholder="по-английски" required>
                                    </div>
                                    @if( $errors->has('name_en') )
                                        <span class="error-label">{{ $errors->first('name_en') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Сайт</label>
                        </div>
                        <div>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input class="uk-input{{ $errors->has('url') ? ' uk-form-danger' : '' }}" id="form-horizontal-text" name="url" type="url" required>
                            </div>
                            @if( $errors->has('url') )
                                <span class="error-label">{{ $errors->first('url') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Языки, на которых разговаривает персонал</label>
                        </div>
                        <div>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input class="uk-input" id="form-horizontal-text" name="languages" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Описание</label>
                        </div>
                        <div>
                            <textarea name="description_ru" class="uk-textarea" rows="5" placeholder="на русском языке"></textarea>
                            <textarea name="description_en" style="margin-top: 5px" class="uk-textarea" rows="5" placeholder="на английском языке"></textarea>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Тип недвижимости</label>
                        </div>
                        <div>
                            <div class="uk-form-controls" style="text-align: left">
                                <label class="filter-option"><input name="propType" value="{{ $propertyTypes[ 0 ]->id }}" class="uk-radio" type="radio" checked> {{ $propertyTypes[ 0 ]->title_ru }}</label><br>
                                @for( $i = 1, $count = count( $propertyTypes ); $i < $count; ++$i )
                                    <label class="filter-option"><input name="propType" value="{{ $propertyTypes[ $i ]->id }}" class="uk-radio" type="radio"> {{ $propertyTypes[ $i ]->title_ru }}</label><br>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Дополнительные опции</label>
                        </div>
                        <div>
                            <div class="uk-form-controls" style="text-align: left">
                                <label class="filter-option"><input name="wifi" class="uk-checkbox" type="checkbox" checked> WIFI</label><br>
                                <label class="filter-option"><input name="parking" class="uk-checkbox" type="checkbox" checked> Парковка</label><br>
                                <label class="filter-option"><input name="restaurant" class="uk-checkbox" type="checkbox" checked> Ресторан</label><br>
                                <label class="filter-option"><input name="swimming_pool" class="uk-checkbox" type="checkbox" checked> Бассейн</label><br>
                                <label class="filter-option"><input name="bar" class="uk-checkbox" type="checkbox" checked> Бар</label><br>
                                <label class="filter-option"><input name="gym" class="uk-checkbox" type="checkbox" checked> Тренажерный зал</label><br>
                                <label class="filter-option"><input name="laundry" class="uk-checkbox" type="checkbox" checked> Прачечная</label><br>
                                <label class="filter-option"><input name="pets_allowed" class="uk-checkbox" type="checkbox" checked> Разрешены питомцы</label><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Главное фото отеля</label>
                        </div>
                        <div style="text-align: left">
                            <div uk-form-custom="target: true">
                                <input type="file" accept="image/*" name="image" id="image">
                                <input class="uk-input uk-form-width-medium" type="text" placeholder="Нажмите здесь..." disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Дата основания</label>
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