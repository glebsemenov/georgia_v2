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
        <p class="title">Добавить комнату</p>
    </div>
</div>

<br><br>
<div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <span>Больше разнообразных комнат - больше клиентов</span>
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
            <form method="POST" action="{{ url('/property/room') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $id }}" name="hotel_id">
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Тип комнаты</label>
                        </div>
                        <div>
                            <div class="uk-form-controls">
                                <select name="room_type_id" class="uk-select" id="form-horizontal-select">
                                    @for( $i = 0, $count = count( $roomTypes ); $i < $count; ++$i )
                                        <option value="{{ $roomTypes[$i]->id }}">{{ $roomTypes[$i]->title_ru }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Цена за ночь и количество таких номеров в отеле</label>
                        </div>
                        <div>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input placeholder="цена" class="uk-input" id="form-horizontal-text" name="price" min="1" max="20000" type="number" required>
                            </div>
                            <div style="margin-top: 5px" class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input placeholder="количество" class="uk-input" id="form-horizontal-text" name="count" type="number" min="1" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <label class="uk-form-label" for="form-horizontal-text">Количество комнат в номере</label>
                        </div>
                        <div>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                <input class="uk-input" id="form-horizontal-text" name="number_of_rooms" type="number" min="1" max="30"  required autofocus>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="uk-divider-icon">

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
                            <label class="uk-form-label" for="form-horizontal-text">Добавьте фотографии</label>
                        </div>
                        <div style="text-align: left">
                            <div uk-form-custom="target: true">
                                <input type="file" multiple accept="image/*" name="images[]" required>
                                <input class="uk-input uk-form-width-medium" type="text" placeholder="Нажмите здесь..." disabled required>
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