@extends('front.layout.app')

@section('main_content')
    <style>
        .bg-animation {
            animation: bg-animation 25s ease-in-out infinite;
            padding-top: 40px;
            padding-bottom: 40px;
            text-align: center;
            background-image: url(uploads/slide.jpg); /* Фоновая картинка */
            background-repeat: no-repeat;
            border: 1px solid #BFE2FF;
            margin: 20px 0;
            height: 500px;
            font-size: 26px;
            font-family: 'Roboto', sans-serif;
        }

        @media (max-width: 620px) {
            .bg-animation {
                padding: 100px 20px;
                font-size: 26px;
            }
        }
        @keyframes bg-animation {
            0% {
                background-size: 120%;
                background-position: 50% 50%
            }
            20% {
                background-size: 150%;
                background-position: 0 50%;
            }
            40% {
                background-size: 110%;
                background-position: 20% 80%;
            }
            60% {
                background-size: 160%;
                background-position: 60% 10%;
            }
            80% {
                background-size: 120%;
                background-position: 40% 70%;
            }
            100% {
                background-size: 120%;
                background-position: 50% 50%
            }
        }
    </style>

    <div class="slider">
        <div class="slide-carousel owl-carousel">
            @foreach($slide_all as $item)
                <div class="item" style="background-image:url({{ asset('uploads/'.$item->photo) }});">
                    <div class="bg"></div>
                    <div class="text">
                        <h2>{{ $item->heading }}</h2>
                        <p>
                            {!! $item->text !!}
                        </p>
                        @if($item->button_text != '')
                            <div class="button">
                                <a href="{{ $item->button_url }}">{{ $item->button_text }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>




    <div class="home-feature">
        <div class="container">
            <div class="row">

                @foreach($feature_all as $item)
                    <div class="col-md-3">
                        <div class="inner">
                            <div class="icon"><i class="{{ $item->icon }}"></i></div>
                            <div class="text">
                                <h2>{{ $item->heading }}</h2>
                                <p>
                                    {!! $item->text !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="search-section">
        <div class="container">
            <form action="{{ route('cart_submit') }}" method="post">
                @csrf
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select name="room_id" class="form-select">
                                    <option value="">Выбрать комнату</option>
                                    @foreach($room_all as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Время заезда и выезда">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Взрослые">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Дети">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Забронировать</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="home-rooms">
        <div class="container">

            <div class="row">
                @foreach($room_all as $item)

                    <div class="col-md-3">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a></h2>
                                <div class="price">
                                    ₽{{ $item->price }}/ночь
                                </div>
                                <div class="button">
                                    <a href="{{ route('room_detail',$item->id) }}" class="btn btn-primary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="big-button">
                        <a href="{{ route('room') }}" class="btn btn-primary">Посмотреть все комнаты</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="testimonial bg-animation" >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">Наши счастливые посетители</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-carousel owl-carousel">
                            @foreach($testimonial_all as $item)
                                <div class="item">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                                    </div>
                                    <div class="text">
                                        <h4>{{ $item->name }}</h4>
                                        <p>{{ $item->designation }}</p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            {!! $item->comment !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <div class="blog-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Последние посты</h2>
                </div>
            </div>
            <div class="row">

                @foreach($post_all as $item)

                    <div class="col-md-4">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('post',$item->id) }}">{{ $item->heading }}</a></h2>
                                <div class="short-des">
                                    <p>
                                        {!! $item->short_content !!}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('post',$item->id) }}" class="btn btn-primary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach
    @endif

@endsection
