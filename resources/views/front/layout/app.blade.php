<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <title>Веб сайт религиозного туризма</title>

    <link rel="icon" type="image/png"  href="{{ asset('uploads/favicon.png') }}">

    @include('front.layout.styles')

    @include('front.layout.scripts')


    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">

    <!-- Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-84213520-6');
    </script> -->

</head>
<body>

<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">8 843-222-3333</li>
                    <li class="email-text">religious_tourizm@mail.ru</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    <li class="menu"><a href="cart.html">Корзина</a></li>
                    <li class="menu"><a href="checkout.html">Оформление</a></li>
                    <li class="menu"><a href="signup.html">Зарегистрироваться</a></li>
                    <li class="menu"><a href="login.html">Логин</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="uploads/logo.png" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="uploads/logo1.png" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a href="{{route('home')}}" class="nav-link">Главная страница</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Экскурсии</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Литература</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Мусульманская</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Православная</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Заказать</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Требы</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Мусульманские молитвы</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Календарь</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Мусульманских праздников</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Православных праздников</a>
                                </li>
                            </ul>
                        </li>
                        @if($global_page_data->about_status == 1)
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link">{{ $global_page_data->about_heading }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Комнаты</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Стандартная кровать</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Две отдельные кровати</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Стандартная кровать</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Кровать для людей с ограниченными возможностями</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Люкс «Премиум»</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Галерея</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('photo_gallery') }}" class="nav-link">Фото галерея</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('video_gallery') }}" class="nav-link">Видеогалерея</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog') }}" class="nav-link">Блог</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Контакты</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield('main_content')


<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Ссылки сайта</h2>
                    <ul class="useful-links">
                        <li><a href="rooms.html">Размещение</a></li>
                        <li><a href="{{ route('photo_gallery') }}">Фото галерея</a></li>
                        <li><a href="{{ route('video_gallery') }}">Видио галерея</a></li>
                        <li><a href="{{ route('blog') }}">Блог</a></li>
                        <li><a href="{{ route('faq') }}">Часто задаваемые вопросы</a></li>
                        <li><a href="contact.html">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Полезные ссылки</h2>
                    <ul class="useful-links">
                        <li><a href="index.html">Главная страница</a></li>
                        @if($global_page_data->terms_status == 1)
                            <li><a href="{{ route('terms') }}">{{ $global_page_data->terms_heading }}</a></li>
                        @endif
                        <li><a href="privacy.html">Политика конфиденциальности</a></li>
                        <li><a href="disclaimer.html">Отказ от ответственности</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Контакты</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="right">
                            Россия,<br>
                            Казань, 420012
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-volume-control-phone"></i>
                        </div>
                        <div class="right">
                            religious_tourism@mail.ru
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="right">
                            843-222-3333
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Новостная рассылка</h2>
                    <p>
                        Чтобы быть в курсе последних новостей и других замечательных материалов, подпишитесь на нас здесь:
                    </p>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Подписаться">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="copyright">
    Copyright 2023,  Все права защищены.
</div>

<div class="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>


@include('front.layout.scripts_footer')

</body>
</html>
