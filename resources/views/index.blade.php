<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Poiret+One" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC" rel="stylesheet">
    <title>{{ trans('index.title') }}</title>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/queries.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="top">
<header id="home">
    <nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <nav class="pull">
                        <ul class="top-nav">
                            <li><a href="#intro"><i class="fa fa-mortar-board"></i><br><br>{{ trans('index.nav_about') }}</a></li>
                            <li><a href="#features"><i class="fa fa-list"></i><br><br>{{ trans('index.nav_do') }}</a></li>
                            <li><a href="#responsive"><i class="fa fa-sitemap"></i><br><br>{{ trans('index.nav_why') }}</a></li>
                            <li><a href="#portfolio"><i class="fa fa-bar-chart"></i><br><br>{{ trans('index.nav_offers') }}</a></li>
                            <li><a href="#team"><i class="fa fa-child"></i><br><br>{{ trans('index.nav_team') }}</a></li>
                            <li><a href="#contact"><i class="fa fa-eye"></i><br><br>{{ trans('index.nav_contacts') }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <section class="hero" id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right navicon">
                    <a id="nav-toggle" class="nav_slide_button" href="javascript:void(0);"><span></span></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center inner">
                    <h1 class="animated fadeInDown"><span>Welcome to</span> Georgia</h1>
                    <p class="animated fadeInUp delay-05s">{{ trans('index.slogan') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @if( Auth::guest() )
                        <a href="/signup" class="learn-more-btn">{{ trans('index.btn_gotoProfilePage') }}</a>
                    @elseif( ! \App\Http\Controllers\PropertyController::isUserHasProperty( Auth::user()->id ) && Auth::user()->user_type_id == 2 )
                        <a href="/property/register/" class="learn-more-btn">
                            Добавить отель
                        </a>
                    @elseif( \App\Http\Controllers\PropertyController::isUserHasProperty( Auth::user()->id ) )
                        <a href="{{ '/hotel/' . \App\Http\Controllers\PropertyController::getUserProperty( Auth::user()->id ) }}" class="learn-more-btn">
                            Управление отелем
                        </a>
                    @endif
                    <a href="/properties" class="learn-more-btn">Подобрать отель</a>
                </div>
            </div>
        </div>
    </section>
</header>
<section class="intro text-center section-padding" id="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wp1">
                <h1 class="arrow">{{ trans('index.aboutUs') }}</h1>
                <p>{{ trans('index.aboutUs_description') }}</p>
            </div>
        </div>
    </div>
</section>
<section class="team text-center section-padding" id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="arrow">Что мы можем предложить</h1>
            </div>
        </div>
        <div class="row">
            <div class="team-wrapper">
                <div id="teamSlider">
                    <ul class="slides">
                        <li>
                            <div class="col-md-4 wp5">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Бронирование отелей</h2>
                                <p>Для вас представлены: отели класса люкс, небольшие уютные гостиницы, чистые и ухоженные хостелы, квартиры и дома в частных секторах. Наши база постоянно обновляется, поэтому вы видите только самую свежую и актуальную информацию</p>
                            </div>

                            <div class="col-md-4 wp5 delay-05s">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Экскурсии и туры</h2>
                                <p>Окунитесь в разнообразие предлагаемых нами туров и экскурсий в Грузии, как групповых, так и индивидуальных. Всех их объединяет одно – мы работаем только с опытными гидами, потому что неопытные давно заблудились в горах и познали дзен</p>
                            </div>
                            <div class="col-md-4 wp5 delay-1s">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Трансфер</h2>
                                <p>Наши водители имеют большой стаж вождения и, даже не смотря на горный серпантин на некоторых участках грузинской дороги, в итоге вы окажетесь не в глубоком шоке от проделанного пути, а в своей гостинице</p>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4 wp5">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Водный отдых</h2>
                                <p>Вы можете получить незабываемые ощущения, катаясь по раскатистым волнам чёрного моря на бананах и бубликах, но если вы не любите играть с едой, то можно арендовать лодку, водный скутер, яхту или даже парашют, чтобы парить над волнами в невесомости. Только будьте осторожны и не залетите за границу в Турцию, а то вас могут задержать, и всё так весело закончится, что воспоминаний хватит на весь остаток путешествия</p>
                            </div>
                            <div class="col-md-4 wp5 delay-05s">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Ночная жизнь</h2>
                                <p>Не хотите терять ни минуты от драгоценного отдыха в Грузии, и не собираетесь спать даже ночью? В Грузии для любителей ночной жизни предоставлен достаточно широкий выбор времяпрепровождения. Мы знаем, где ночью продают самые вкусные хачапури, в какие можно пойти клубы, какие места ночью можно посетить абсолютно бесплатно, где можно поиграть в рулетку и, как после игры в рулетку накопить деньги на обратный путь домой</p>
                            </div>
                            <div class="col-md-4 wp5 delay-1s">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Кафе и рестораны</h2>
                                <p>В Грузии, в отличие от других стран, у вас не будет проблем с выбором места, где можно отведать исконно национальную грузинскую кухню. Гастрономический потенциал Грузии так велик, что из 90% кафе, вы уйдёте с улыбкой на устах. Но чтобы случайно не попасть в те 10% злополучных кафе, вы найдёте на нашем сайте подборки заведений, которые точно никого не разочаруют. Почувствуйте вместе с нами силу грузинской кухни</p>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4 wp5">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Прокат</h2>
                                <p>Что вам больше нравится, - активные прогулки в горы, на водопады и до древних строений первых веков нашей эры? Или мечтательный отдых на пляже, наполненный сладкой истомы в тени уютного шезлонга? В любом из случаев, мы поможем организовать ваш отдых максимально комфортно: через нас вы можете выгодно арендовать всё и всех, - автомобили, велосипеды, яхты, коньки, оборудование для походов, нашего менеджера по продажам (если он будет плохо справляться со своей основной работой), и много других классных радостей, которые вам захочется испытать</p>
                            </div>
                            <div class="col-md-4 wp5 delay-05s">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Зимний отдых</h2>
                                <p>Зима чудесная пора для отдыха в Грузии. Горнолыжные курорты завлекают в свои сети любителей экстремальных ощущений, а многочисленные кафе особенно уютны, и готовы отогреть всех гостей Грузии своим гостеприимством и вкусной дымящейся едой. Наш сервис готов к зиме, и предоставит вам все те же услуги, что и летом, - помощь в поиске гостиницы, подбор интересных туров и экскурсий, прокат лыж и прочего оборудования, разница вашего отдыха будет лишь в том, что будет холоднее, и вокруг будет лежать снег</p>
                            </div>
                            <div class="col-md-4 wp5 delay-1s">
                                <div class="icon">
                                    <i class="fa fa-heart shadow"></i>
                                </div>
                                <h2>Интересные места</h2>
                                <p>Грузия – маленькая страна, хранящая в себе много тайн и секретов, которые до сих пор не дают покоя учёным со всего мира. И иногда случается так, что нога любопытного туриста ступает туда, где не бывали даже большинство из грузин, и тогда миру открываются новые невиданные ранее фотографии и интересные маршруты. Мы считаем, что мир имеет право знать о таких местах, поэтому у нас есть <a href="https://vk.com/wtogeorgia" target="_blank">группа ВКонтакте</a>, куда люди присылают свои отчёты о путешествиях и не только, а так же информационный <a href="http://wto-georgia.ru" target="_blank">сайт–дубляж группы</a>, где вы можете поближе познакомиться с нашей страной</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="text-center" id="responsive">
    <div class="container-fluid nopadding responsive-services">
        <div class="wrapper">
            <div class="iphone">
                <div class="wp3"></div>
            </div>
            <div class="fluid-white"></div>
        </div>
        <div class="container designs">
            <div class="row">
                <div class="col-md-5 col-md-offset-7">
                    <div id="servicesSlider">
                        <ul class="slides">
                            <li>
                                <h1 class="arrow">Заголовок №1 почему сюда стоит поехать</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero. </p>
                                <p>
                                    Mauris ultrices odio vitae nulla ultrices iaculis. Nulla rhoncus odio eu lectus
                                    faucibus facilisis. Maecenas ornare augue vitae sollicitudin accumsan. </p>
                                <p>Etiam eget libero et erat eleifend consectetur a nec lectus. Sed id tellus lorem.
                                    Suspendisse sed venenatis odio, quis lobortis eros.</p>
                            </li>
                            <li>
                                <h1 class="arrow">Заголовок №2 почему сюда стоит поехать</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero. </p>
                                <p>
                                    Mauris ultrices odio vitae nulla ultrices iaculis. Nulla rhoncus odio eu lectus
                                    faucibus facilisis. Maecenas ornare augue vitae sollicitudin accumsan. </p>
                                <p>Etiam eget libero et erat eleifend consectetur a nec lectus. Sed id tellus lorem.
                                    Suspendisse sed venenatis odio, quis lobortis eros.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="swag text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Теперь вы готовы<span>ознакомиться с нашими лучшими предложениями</span></h1>
                <a href="#portfolio" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="portfolio text-center section-padding" id="portfolio">
    <div class="container">
        <div class="row">
            <div id="portfolioSlider">
                <ul class="slides">

                    @for( $i = 0, $counter = 0; $i < $config['bestOfferSlidesCount']; ++$i )
						<?php if( ! ( $i % 3 ) ) echo '<li>'; ?>
                        <div class="col-md-4 wp4">
                            <div class="custom-card">
                                <div class="delay-{{ \App\Http\Controllers\IndexController::calculateDelay( $counter ) }}s">
                                    <div class="overlay-effect effects clearfix">
                                        <div class="img">
                                            {{--<img src="img/portfolio-02.jpg" alt="Portfolio Item">--}}
                                            <img src="{{ $hotels[$i]->photo }}" alt="Portfolio Item">
                                            <div class="overlay">
                                                <a href="/hotel/{{ $hotels[$i]->id }}" class="expand"><i class="fa fa-search"></i><br>Детальный
                                                    обзор</a>
                                                <a class="close-overlay hidden">x</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hotel-name">{{ ( App::isLocale( 'en' ) ? $hotels[$i]->name_en : $hotels[$i]->name_ru ) }}</div>
                                    <div class="hotel-stars">
                                        @for( $j = 1; $j < 6; ++$j )
                                            <i style="color: orange;"
                                               class="fa fa-star{{ ( $j > $hotels[$i]->stars ) ? '-o': '' }}"></i>
                                        @endfor
                                    </div>
                                    <div class="hotel-location">
                                        <h4>{{ ( App::isLocale( 'en' ) ? $hotels[$i]->city->title_en : $hotels[$i]->city->title_ru ) }}
                                            , {{ ( App::isLocale( 'en' ) ? $hotels[$i]->city->country->title_en : $hotels[$i]->city->country->title_ru ) }}</h4>
                                        <p>Great hotel</p>
                                    </div>
                                    <div class="hotel-actions">
                                        <p>номера от 4000р</p>
                                    </div>
                                    <a href="/hotel/{{ $hotels[$i]->id }}" class="hvr-shutter-out-horizontal">Детальный обзор</a>
                                </div>
                            </div>
                        </div>
						<?php if( ! ( ( $i + 1 ) % 3 ) && $config['bestOfferSlidesCount'] != 9 ) echo '</li>'; ?>
                        @endfor
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="ignite-cta text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/properties" class="ignite-btn">Полный перечень отелей</a>
            </div>
        </div>
    </div>
</div>
<section class="team text-center section-padding" id="team">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="arrow">Кто работает для вас 25 часов сутки, 8 дней в неделю, 8 дней в месяц...</h1>
            </div>
        </div>
        <div class="row">
            <div class="team-wrapper">
                <div id="teamSlider">
                    <ul class="slides">
                        <li>
                            <div class="col-md-4 wp5">
                                <img src="img/team-01.png" alt="Team Member">
                                <h2>Катя Гиорхелидзе</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
                                <div class="social">
                                    <ul class="social-buttons">
                                        <li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4 wp5 delay-05s">
                                <img src="img/team-02.png" alt="Team Member">
                                <h2>Леся Сущенко</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
                                <div class="social">
                                    <ul class="social-buttons">
                                        <li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 wp5 delay-1s">
                                <img src="img/team-03.png" alt="Team Member">
                                <h2>Надежда Яркова</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
                                <div class="social">
                                    <ul class="social-buttons">
                                        <li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-4 wp5">
                                <img src="img/team-01.png" alt="Team Member">
                                <h2>Илья Казарян</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
                                <div class="social">
                                    <ul class="social-buttons">
                                        <li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 wp5 delay-05s">
                                <img src="img/team-02.png" alt="Team Member">
                                <h2>Дима Гиорхелидзе</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
                                <div class="social">
                                    <ul class="social-buttons">
                                        <li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 wp5 delay-1s">
                                <img src="img/team-03.png" alt="Team Member">
                                <h2>Глеб Семенов</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non
                                    metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
                                <div class="social">
                                    <ul class="social-buttons">
                                        <li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="social-btn"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subscribe text-center">
    <div class="container">
        <h1><i class="fa fa-paper-plane"></i><span>Подписаться на самое выгодное и интересное</span></h1>
        <form action="#">
            <input type="text" name="" value="" placeholder="" required>
            <input type="submit" name="" value="Готово">
        </form>
    </div>
</section>
<section class="dark-bg text-center section-padding contact-wrap" id="contact">
    <a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="arrow">Наши контакты</h1>
            </div>
        </div>
        <div class="row contact-details">
            <div class="col-md-4">
                <div class="light-box box-hover">
                    <h2><i class="fa fa-map-marker"></i><span>Адрес</span></h2>
                    <p>Level 6, 23 Pitt St, Sydney</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="light-box box-hover">
                    <h2><i class="fa fa-mobile"></i><span>Телефон</span></h2>
                    <p>+61 9 211 3747</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="light-box box-hover">
                    <h2><i class="fa fa-paper-plane"></i><span>Email</span></h2>
                    <p><a href="#">hey@halcyondays.com</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="social-buttons">
                    <li><a href="https://vk.com/wtogeorgia" class="social-btn"><i class="fa fa-vk"></i></a></li>
                    <li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
                    <li>
                        <a href="https://www.facebook.com/Welcome-to-Georgia-%D0%93%D1%80%D1%83%D0%B7%D0%B8%D1%8F-1643804892303688/"
                           class="social-btn"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/welcome_to_georgia/" class="social-btn"><i
                                    class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="social-btn"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="legals">
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Legals</a></li>
                </ul>
            </div>
            <div class="col-md-6 credit">
                <p>Designed by <a href="http://www.peterfinlan.com/">Peter Finlan</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/waypoints.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/modernizr.js"></script>

</body>
</html>