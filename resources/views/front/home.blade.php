@extends('front.layout.app')

@section('main_content')
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

    <div class="search-section">
        <div class="container">
            <form action="cart.html" method="post">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select name="" class="form-select">
                                    <option value="">Выберите комнату</option>
                                    <option value="">Стандартный номер</option>
                                    <option value="">Улучшенный номер </option>
                                    <option value="">Стандартный четырехместный номер</option>
                                    <option value="">Улучшенный четырехместный номер</option>
                                    <option value="">VIP-номер</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Регистрация и оформление заказа">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="" class="form-control" min="1" max="30" placeholder="Взрослые">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="" class="form-control" min="1" max="30" placeholder="Дети">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Заказать</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="home-feature">
        <div class="container">
            <div class="row">
               
                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-superpowers"></i></div>
                        <div class="text">
                            <h2>Экскурсии по религиозным местам Казани</h2>
                            <p>
                                На нашем сайте можно заказать экскурсию по религиозным местам Казани с квалифицированным экскурсоводом
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-money"></i></div>
                        <div class="text">
                            <h2>Сделать пожертвование</h2>
                            <p>
                                 На нашем сайте можно сделать пожертвование на выбранный Вами религиозный объект
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-cubes"></i></div>
                        <div class="text">
                            <h2>Молельные залы</h2>
                            <p>
                                Выберите зал и время для уединенной молитвы
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-crosshairs"></i></div>
                        <div class="text">
                            <h2>Религиозная литература</h2>
                            <p>
                                Можно заказать книгу по выбранной вами тематике
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-clock-o"></i></div>
                        <div class="text">
                            <h2>Оставить заявку на молитву</h2>
                            <p>
                                Здесь Вы можете выбрать вид молитвы, разместить список Ваших родных и желаемый храм, либо мечеть
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-wifi"></i></div>
                        <div class="text">
                            <h2>Все для совершения обрядов</h2>
                            <p>
                            Участники получают доступ к эксклюзивным скидкам проекта Visit Tatarstan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-coffee"></i></div>
                        <div class="text">
                            <h2>Национальная татарская одежда и сувениры</h2>
                            <p>
                            Питание по религиозным стандартам в зависимости от выбранной программы
                            </p>
                        </div>
                    </div>
                </div>
                
               
                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="fa fa-cutlery"></i></div>
                        <div class="text">
                            <h2>Питание по стандартам халяль</h2>
                            <p>
                                Соблюдаем все стандарты питания.!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="home-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Размещение</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/1.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/2.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/3.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная  кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/4.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная  кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/5.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная  кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/6.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная  кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/7.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/1.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">Стандартная кровать</a></h2>
                            <div class="price">
                                ₽100/Ночь
                            </div>
                            <div class="button">
                                <a href="room-detail.html" class="btn btn-primary">Смотрите подробности</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="big-button">
                        <a href="" class="btn btn-primary">Посмотреть все комнаты</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="testimonial" style="background-image: url(public/uploads/slide2.jpg)">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Отзывы наших клиентов</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-carousel owl-carousel">
                        <div class="item">
                            <div class="photo">
                                <img src="uploads/t1.jpg" alt="">
                            </div>
                            <div class="text">
                                <h4>Надежда Круглова</h4>
                                <p>Москва </p>
                            </div>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens. Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="photo">
                                <img src="uploads/t2.jpg" alt="">
                            </div>
                            <div class="text">
                                <h4>Моххамед аль Фаррах</h4>
                                <p>Арабские Эмираты</p>
                            </div>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens. Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="blog-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Последние сообщения</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/1.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="post.html">Это пример заголовка записи в блоге</a></h2>
                            <div class="short-des">
                                <p>
                                    Если вы хотите получить какой-то хороший контент от жителей вашей страны, тогда просто внесите свой вклад в основное сообщество вашего народа, и я уверен, что вы получите от этого пользу.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/2.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="post.html">Это пример заголовка записи в блоге</a></h2>
                            <div class="short-des">
                                <p>
                                    Если вы хотите получить какой-то хороший контент от жителей вашей страны, тогда просто внесите свой вклад в основное сообщество вашего народа, и я уверен, что вы получите от этого пользу.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inner">
                        <div class="photo">
                            <img src="uploads/3.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="post.html">Это пример заголовка записи в блоге</a></h2>
                            <div class="short-des">
                                <p>
                                    Если вы хотите получить какой-то хороший контент от жителей вашей страны, тогда просто внесите свой вклад в основное сообщество вашего народа, и я уверен, что вы получите от этого пользу.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
