<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <title>Веб сайт религиозного туризма</title>

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
                    <li class="phone-text">8 843-222-3333</li>
                    <li class="email-text">religious_tourizm@mail.ru</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    @if($global_page_data->cart_status == 1)
                        <li class="menu"><a href="{{ route('cart') }}">{{ $global_page_data->cart_heading }}@if(session()->has('cart_room_id') and !session()->has('cart_book_id'))<sup>{{ count(session()->get('cart_room_id')) }}</sup>@endif @if(session()->has('cart_book_id') and !session()->has('cart_room_id'))<sup>{{ count(session()->get('cart_book_id')) }}</sup>@endif @if(session()->has('cart_room_id') and session()->has('cart_book_id'))<sup>{{ count(session()->get('cart_room_id')) + count(session()->get('cart_book_id')) }}</sup>@endif</a></li>
                    @endif

                    @if($global_page_data->checkout_status == 1)
                    <li class="menu"><a href="checkout.html">{{ $global_page_data->checkout_heading }}</a></li>
                    @endif

                        @if(!Auth::guard('customer')->check())

                            @if($global_page_data->signup_status == 1)
                                <li class="menu"><a href="{{ route('customer_signup') }}">{{ $global_page_data->signup_heading }}</a></li>
                            @endif

                            @if($global_page_data->signin_status == 1)
                                <li class="menu"><a href="{{ route('customer_login') }}">{{ $global_page_data->signin_heading }}</a></li>
                            @endif

                        @else

                            <li class="menu"><a href="{{ route('customer_home') }}">Панель</a></li>

                        @endif

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
                            <a href="#" class="nav-link">Экскурсии</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('index-book')}}" class="nav-link">Литература</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Заказать</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('indexTrebi') }}" class="nav-link">Православные требы</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('indexMuslimPrays') }}" class="nav-link">Мусульманскую молитву</a>
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
                                @foreach($global_room_data as $item)
                                    <li class="nav-item">
                                        <a href="{{ route('room_detail',$item->id) }}" class="nav-link">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @if($global_page_data->photo_gallery_status == 1 || $global_page_data->video_gallery_status == 1)
                            <li class="nav-item">
                                <a href="javascript:void;" class="nav-link dropdown-toggle">Галереи</a>
                                <ul class="dropdown-menu">

                                    @if($global_page_data->photo_gallery_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route('photo_gallery') }}" class="nav-link">{{ $global_page_data->photo_gallery_heading }}</a>
                                        </li>
                                    @endif

                                    @if($global_page_data->video_gallery_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route('video_gallery') }}" class="nav-link">{{ $global_page_data->video_gallery_heading }}</a>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif

                        @if($global_page_data->blog_status == 1)
                            <li class="nav-item">
                                <a href="{{ route('blog') }}" class="nav-link">{{ $global_page_data->blog_heading }}</a>
                            </li>
                        @endif

                        @if($global_page_data->contact_status == 1)
                            <li class="nav-item">
                                <a href="{{ route('contact') }}" class="nav-link">{{ $global_page_data->contact_heading }}</a>
                            </li>
                        @endif
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
                        @if($global_page_data->photo_gallery_status == 1)
                            <li><a href="{{ route('photo_gallery') }}">{{ $global_page_data->photo_gallery_heading }}</a></li>
                        @endif

                        @if($global_page_data->video_gallery_status == 1)
                            <li><a href="{{ route('video_gallery') }}">{{ $global_page_data->video_gallery_heading }}</a></li>
                        @endif

                        @if($global_page_data->blog_status == 1)
                            <li><a href="{{ route('blog') }}">{{ $global_page_data->blog_heading }}</a></li>
                        @endif

                        @if($global_page_data->contact_status == 1)
                            <li><a href="{{ route('contact') }}">{{ $global_page_data->contact_heading }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Полезные ссылки</h2>
                    <ul class="useful-links">
                        <li><a href="{{ route('home') }}">Главная страница</a></li>
                        @if($global_page_data->terms_status == 1)
                            <li><a href="{{ route('terms') }}">{{ $global_page_data->terms_heading }}</a></li>
                        @endif
                        @if($global_page_data->privacy_status == 1)
                            <li><a href="{{ route('privacy') }}">{{ $global_page_data->privacy_heading }}</a></li>
                        @endif

                        @if($global_page_data->faq_status == 1)
                            <li><a href="{{ route('faq') }}">{{ $global_page_data->faq_heading }}</a></li>
                        @endif

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
                    <form action="{{ route('subscriber_send_email') }}" method="post" class="form_subscribe_ajax">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control">
                            <span class="text-danger error-text email_error"></span>
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

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

<script>
    (function($){
        $(".form_subscribe_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }

                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>

</body>
</html>
