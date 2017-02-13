@extends('layouts.app')

@section('content')

    <div class="uk-grid-match uk-grid-small" uk-grid>
        <div class="uk-width-1-3@m">
            <div class="uk-card uk-card-default uk-card-body filter-bg">
                <form method="GET" action="{{ url('/properties') }}">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Город</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-form-small" id="form-stacked-text" type="text" placeholder="Поиск по всем городам по умолчанию">
                        </div>
                    </div>
                    {{--<div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>--}}
                        {{--<div>--}}
                            {{--<div class="uk-margin">--}}
                                {{--<label class="uk-form-label" for="form-stacked-text">Заезд</label>--}}
                                {{--<div class="uk-form-controls">--}}
                                    {{--<input class="uk-input uk-form-small" type="date" id="myDate" value="2017-02-03">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div>--}}
                            {{--<div class="uk-margin">--}}
                                {{--<label class="uk-form-label" for="form-stacked-text">Выезд</label>--}}
                                {{--<div class="uk-form-controls">--}}
                                    {{--<input class="uk-input uk-form-small" type="date" id="myDate" value="2018-02-03">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <hr class="uk-divider-icon">
                    <div class="uk-grid-collapse uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="pointsFrom">Цена от $<span id="priceFrom">0</span></label>
                                <div class="uk-form-controls">
                                    <input class="uk-form-small" type="range" name="pointsFrom" id="pointsFrom" value="0" min="0" max="20000" onmousemove="rangeValueFromChanged()">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="pointsTo">Цена до $<span id="priceTo">20000</span></label>
                                <div class="uk-form-controls">
                                    <input class="uk-form-small" type="range" name="pointsTo" id="pointsTo" value="20000" min="0" max="20000" onmousemove="rangeValueToChanged()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin uk-text-center">
                        <label class="uk-form-label" for="rating">Средний рейтинг отеля: <span id="ratingDisplay">0</span></label>
                        <div class="uk-form-controls">
                            <input class="uk-form-small" type="range" name="rating" id="rating" value="0" min="0" max="10" onmousemove="rangeRatingChanged()" readonly>
                        </div>
                    </div>
                    <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="pointsFrom">Комнаты</label>
                                <div class="uk-form-controls">
                                    <select class="uk-select uk-form-small" name="rooms">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--<div>--}}
                            {{--<div class="uk-margin">--}}
                                {{--<label class="uk-form-label" for="pointsTo">Взрослые</label>--}}
                                {{--<div class="uk-form-controls">--}}
                                    {{--<select class="uk-select uk-form-small" name="adults">--}}
                                        {{--<option>1</option>--}}
                                        {{--<option>2</option>--}}
                                        {{--<option>3</option>--}}
                                        {{--<option>4</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div>--}}
                            {{--<div class="uk-margin">--}}
                                {{--<label class="uk-form-label" for="pointsTo">Дети</label>--}}
                                {{--<div class="uk-form-controls">--}}
                                    {{--<select class="uk-select uk-form-small" name="children">--}}
                                        {{--<option>0</option>--}}
                                        {{--<option>1</option>--}}
                                        {{--<option>2</option>--}}
                                        {{--<option>3</option>--}}
                                        {{--<option>4</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <hr class="uk-divider-icon">
                    <div class="uk-margin">
                        <label class="uk-form-label custom-nav-header" for="form-stacked-text"><i class="fa fa-bed" aria-hidden="true"></i> Тип жилья</label>
                        <div class="uk-form-controls">
                            @for( $i = 0; $i < count ( $propertyTypes ); ++$i )
                                <label class="filter-option"><input name="prop{{ $i + 1 }}" class="uk-checkbox" type="checkbox" checked> {{ $propertyTypes[ $i ]->title_ru }}</label><br>
                            @endfor
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label custom-nav-header" for="form-stacked-text"><i class="fa fa-star" aria-hidden="true"></i> Количество звезд</label>
                        <div class="uk-form-controls">
                            @for( $i = 1; $i <= 5; ++$i)
                                <label class="filter-option"><input name="star{{ $i }}" class="uk-checkbox" type="checkbox" checked>
                                    @for( $j = 0; $j < $i; ++$j)
                                        <i class="fa fa-star" aria-hidden="true" style="color: orange"></i>
                                    @endfor
                                </label><br>
                            @endfor
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label custom-nav-header" for="form-stacked-text"><i class="fa fa-cogs" aria-hidden="true"></i> Дополнительные опции</label>
                        <div class="uk-form-controls">
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
                    <div class="uk-margin uk-text-center">
                        <button type="submit" class="uk-button uk-button-danger">Применить</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-width-2-3@m preview-hotel-item">
            @foreach( $hotels as $hotel )
                <div class="uk-card uk-card-default uk-card-body hotel-item">
                    <div class="uk-panel">
                        <img class="uk-align-left uk-margin-remove-adjacent property-profile-image" src="{{ $hotel->photo }}">
                        <p class="hotel-title">{{ $hotel->name_ru }}</p>
                        <p class="hotel-rating">Рейтинг: {{ \App\Http\Controllers\PropertyController::getAverageRating( $hotel ) }}</p>
                        <p class="hotel-address"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ $hotel->address_ru }} | {{ $hotel->website }} | {{ $hotel->email }}</p>
                        <div class="custom-divider">
                            <hr>
                        </div>
                        <p class="hotel-description">{{ $hotel->description_ru }}</p>
                    </div>
                    <div class="hotel-stars">
                        @for( $j = 1; $j < 6; ++$j )
                            <i style="color: darkorange;" class="fa fa-star{{ ( $j > $hotel->stars ) ? '-o': '' }}"></i>
                        @endfor
                    </div>
                    <div class="detail-view-link">
                        <a href="/hotel/{{ $hotel->id }}" class="hvr-shutter-out-horizontal">детальный обзор</a>
                    </div>
                    <div class="hotel-price">
                        Цены от ${{ \App\Http\Controllers\PropertyController::getLowestPrice( $hotel->id ) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function rangeValueFromChanged() {
            var x = document.getElementById("pointsFrom").value;
            document.getElementById("priceFrom").innerHTML = x;
        }

        function rangeValueToChanged() {
            var x = document.getElementById("pointsTo").value;
            document.getElementById("priceTo").innerHTML = x;
        }

        function rangeRatingChanged() {
            var x = document.getElementById("rating").value;
            document.getElementById("ratingDisplay").innerHTML = x;
        }
    </script>

@endsection
