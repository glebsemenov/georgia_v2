<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/w3.css">
    <link href="/css/uikit.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/property/hotel.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Poiret+One|Roboto:300" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/uikit.min.js"></script>
    <script>window.Laravel = <?php echo json_encode( [ 'csrfToken' => csrf_token(), ] ); ?></script>

    <style>
        .mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}
    </style>
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
            @if( ! Auth::guest() )
                @if( Auth::user()->id == $hotel->owner_id )
                    <li class="uk-active">
                        <a href="/property/room/{{ $hotel->id }}">
                            <button class="uk-button uk-button-primary nav-font book-btn">Добавить комнату</button>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>

<div class="uk-text-center" uk-grid>
    <div class="uk-width-2-3@m">
        <div class="uk-card uk-card-default uk-card-body">
            <div class="w3-content w3-display-container">
                @for( $i = 0, $count = count( $photos ); $i < $count; ++$i )
                    <img class="mySlides" src="{{ $photos[ $i ] }}" style="max-height: 400px; min-width: 100%">
                @endfor
                <div class="w3-center w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                    <div class="w3-left w3-padding-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                    <div class="w3-right w3-padding-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                    @for( $i = 0, $count = count( $photos ); $i < $count; ++$i )
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv({{ $i + 1 }})"></span>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div class="uk-width-1-3@m">
        <div class="uk-card uk-card-default uk-card-body">
            <h1 class="uk-heading-line uk-text-center"><span class="hotel-title">{{ $hotel->name_ru }}</span></h1>
            <div class="hotel-stars">
                @for( $j = 1; $j < 6; ++$j )
                    <i style="color: orange;" class="fa fa-star{{ ( $j > $hotel->stars ) ? '-o': '' }}"></i>
                @endfor
            </div>
            <div>
                <span class="hotel-address"><i class="fa fa-location-arrow" aria-hidden="true"></i> {{ $hotel->city->title_ru }}, {{ $hotel->address_ru }}</span>
                <br>
                <span class="hotel-address"><i class="fa fa-external-link" aria-hidden="true"></i> {{ $hotel->website }}</span>
                <br>
                <span class="hotel-address"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $hotel->email }}</span>
            </div>
            <br>
            <br>
            <div class="hotel-description">
                {{ $hotel->description_ru }}
            </div>
            <hr class="uk-divider-icon">
            <div>
                <table class="uk-table uk-table-small room-type">
                    <tbody>
                    <tr>
                        <td>Рейтинг отеля</td>
                        <td>{{ $hotel->rating_hotel }}</td>
                    </tr>
                    <tr>
                        <td>Рейтинг ресторана</td>
                        <td>{{ $hotel->rating_restaurant }}</td>
                    </tr>
                    <tr>
                        <td>Рейтинг обслуживания</td>
                        <td>{{ $hotel->rating_service }}</td>
                    </tr>
                    <tr>
                        <td>Рейтинг лояльности цен</td>
                        <td>{{ $hotel->rating_cost_service }}</td>
                    </tr>
                    <tr>
                        <td>Рейтинг расположения отеля</td>
                        <td>{{ $hotel->rating_location }}</td>
                    </tr>
                    <tr>
                        <td>Качество завтрака</td>
                        <td>{{ $hotel->rating_breakfast }}</td>
                    </tr>
                    <tr>
                        <td>Рейтинг комфорта</td>
                        <td>{{ $hotel->rating_comfort }}</td>
                    </tr>
                    <tr>
                        <td>Средний рейтинг отеля</td>
                        <td>{{ \App\Http\Controllers\PropertyController::getAverageRating( $hotel ) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @if( isset( $lowestPrice ) )
                <div class="hotel-prices">
                    Цены от ${{ $lowestPrice }} за ночь
                </div>
            @endif
        </div>
    </div>
</div>

<div class="uk-text-center" uk-grid>
    <div class="uk-width-3-3@m">
        <div class="uk-card uk-card-default uk-card-body">
            <ul class="uk-tab" uk-switcher>
                <li><a href="#">Комнаты</a></li>
                <li><a href="#">Отзывы</a></li>
            </ul>

            <ul class="uk-switcher uk-margin">
                <li>
                    <div class="uk-text-center" uk-grid>
                        @foreach( $rooms as $room )
                            <div class="uk-width-1-3">
                                <div class="room-item">
                                    <div class="uk-card uk-card-default uk-card-body">
                                        <div class="room-image">
                                            <img src="{{ $room->photos->pluck('photo')->first() }}">
                                        </div>
                                        <table class="uk-table uk-table-small room-type">
                                            <tbody>
                                                <tr>
                                                    <td>Тип номера</td>
                                                    <td>{{ $room->type->title_ru }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Количество комнат</td>
                                                    <td>{{ $room->number_of_rooms }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Цена за ночь</td>
                                                    <td>${{ $room->price }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="room-description">
                                            {{ $room->description_ru }}
                                        </div>
                                        <hr class="uk-divider-icon">
                                        <div>
                                            <a class="uk-button uk-button-primary book-btn" href="#modal-sections{{ $room->id }}" uk-toggle>Забронировать</a>

                                            <div id="modal-sections{{ $room->id }}" uk-modal="center: true">
                                                <div class="uk-modal-dialog">
                                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                                    <div class="uk-modal-header">
                                                        <h2 class="uk-modal-title" style="font-size: 18px;text-align: center">Бронирование комнаты</h2>
                                                    </div>
                                                    <div class="uk-modal-body">
                                                        <form method="POST" action="{{ url('/property/book') }}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $room->id }}" name="room_id">
                                                            <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                                                                <div>
                                                                    <div class="uk-margin">
                                                                        <label class="uk-form-label" for="form-stacked-text">Заезд</label>
                                                                        <div class="uk-form-controls">
                                                                            <input name="date_from" class="uk-input uk-form-small" style="font-family: 'Roboto', sans-serif;font-size: 13px;" type="date" id="myDate" value="2017-02-03">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="uk-margin">
                                                                        <label class="uk-form-label" for="form-stacked-text">Выезд</label>
                                                                        <div class="uk-form-controls">
                                                                            <input name="date_to" class="uk-input uk-form-small" style="font-family: 'Roboto', sans-serif;font-size: 13px;" type="date" id="myDate" value="2018-02-03">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                                                                <div>
                                                                    <div class="uk-margin">
                                                                        <label class="uk-form-label" for="pointsTo">Взрослые</label>
                                                                        <div class="uk-form-controls">
                                                                            <select class="uk-select uk-form-small" style="font-family: 'Roboto', sans-serif;font-size: 13px;" name="adults">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="uk-margin">
                                                                        <label class="uk-form-label" for="pointsTo">Дети</label>
                                                                        <div class="uk-form-controls">
                                                                            <select class="uk-select uk-form-small" style="font-family: 'Roboto', sans-serif;font-size: 13px;" name="children">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="uk-margin">
                                                                <label class="uk-form-label" for="form-stacked-text">Ваш email адрес</label>
                                                                <div class="uk-form-controls">
                                                                    <input name="email" style="font-family: 'Roboto', sans-serif;font-size: 13px;" class="uk-input" type="email" required placeholder="Ответ будет выслан на этот адрес">
                                                                </div>
                                                            </div>
                                                            <div class="uk-margin">
                                                                <label class="uk-form-label" for="form-stacked-text">Комментарии и пожелания</label>
                                                                <div class="uk-form-controls">
                                                                    <textarea name="comment" style="font-family: 'Roboto', sans-serif;font-size: 13px;" class="uk-textarea" rows="5" placeholder="Если Вы хотите что-то уточните - напишите это сюда"></textarea>
                                                                </div>
                                                            </div>
                                                            <button class="uk-button uk-button-default uk-modal-close" style="font-family: 'Kurale', sans-serif;font-size: 13px;" type="button">Отмена</button>
                                                            <input class="uk-button uk-button-primary" style="font-family: 'Kurale', sans-serif;font-size: 13px;" type="submit" value="Подтвердить">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </li>
                <li>В разработке</li>
            </ul>
        </div>
    </div>
</div>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " w3-white";
    }
</script>

</body>
</html>