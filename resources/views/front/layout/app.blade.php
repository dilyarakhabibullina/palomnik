<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <title>Веб сайт отеля</title>

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

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
                    <li class="phone-text">+7 919-222-3333</li>
                    <li class="email-text">hotel@mail.ru</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    <li class="menu"><a href="cart.html">Корзина</a></li>
                    <li class="menu"><a href="checkout.html">Расчет</a></li>
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
                    <img src="uploads/logo.png" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">Главная страница</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Номера и люкс</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Стандартная кровать для двоих</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Кровать Делюкс для пары</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Стандартная двуспальная кровать</a>
                                </li>
                                <li class="nav-item">
                                    <a href="room-detail.html" class="nav-link">Двуспальная кровать Делюкс</a>
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
                                    <a href="photo-gallery.html" class="nav-link">Фотогалерея</a>
                                </li>
                                <li class="nav-item">
                                    <a href="video-gallery.html" class="nav-link">Видеогалерея</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="blog.html" class="nav-link">Блог</a>
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
                        <li><a href="rooms.html">Номера и люксы</a></li>
                        <li><a href="photo-gallery.html">Фотогалерея</a></li>
                        <li><a href="blog.html">Блог</a></li>
                        <li><a href="contact.html">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Полезные ссылки</h2>
                    <ul class="useful-links">
                        <li><a href="index.html">Главная страница</a></li>
                        <li><a href="terms.html">Условия и положения</a></li>
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
                            Сочи, 12937
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-volume-control-phone"></i>
                        </div>
                        <div class="right">
                            hotel@mail.ru
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="right">
                            122-222-1212
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
                            <input type="submit" class="btn btn-primary" value="Subscribe Now">
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
