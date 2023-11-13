@extends('front.layout.app')

@section('main_content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/messages/messages.ru-ru.js" type="text/javascript"></script>

    <style>
        * {
            box-sizing: border-box;
        }
        /* Add a gray background color with some padding */
        body {
            font-family: Arial;
            padding: 20px;
            background: #f1f1f1;
        }
        /* Header/Blog Title */
        .header {
            padding: 30px;
            font-size: 40px;
            text-align: center;
            background: white;
        }
        /* Create two unequal columns that floats next to each other */
        /* Left column */
        .leftcolumn {
            float: left;
            width: 75%;
        }
        /* Right column */
        .rightcolumn {
            float: left;
            width: 25%;
            padding-left: 20px;
        }
        /* Fake image */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }
        /* Add a card effect for articles */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            display: none;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        .rating-container .form-control:hover, .rating-container .form-control:focus{
            background: #fff;
            border: 1px solid #ced4da;
        }
        .rating-container textarea:focus, .rating-container input:focus {
            color: #000;
        }
        .excursions-detail__schedule {
            margin: 0 0 32px;
            display: grid;
            row-gap: 24px;
        }
        .excursions-detail__schedule-content {
            display: flex;
            align-items: flex-start;
            column-gap: 24px;
        }
        .excursions-detail__schedule-item {
            font: 500 16px/19px "Fira Sans";
            color: #222;
            position: relative;
            display: flex;
            align-items: flex-start;
        }
        .excursions-detail__schedule-title {
            font-size: 12px;
            line-height: 14px;
            color: #747474;
        }
        .excursions-detail__schedule-item:before {
            content: '';
            width: 24px;
            height: 24px;
            margin: 4px;
            margin-left: 0;
            flex: 0 0 auto;
        }
        .schedule-calendar-icon:before {
            background: url(/uploads/excursions/calendar_icon.svg) no-repeat center;
            background-size: 24px 24px;
        }
        .schedule-time-icon:before {
            background: url(/uploads/excursions/time_icon.svg) no-repeat center;
            background-size: 24px 24px;
        }
        .schedule-marker-icon:before {
            background: url(/uploads/excursions/map_marker_icon.svg) no-repeat center;
            background-size: 24px 24px;
        }
        .schedule-hourglass-icon:before {
            background: url(/uploads/excursions/hourglass_icon.svg) no-repeat center;
            background-size: 24px 24px;
        }
        .schedule-ruble-icon:before {
            background: url(/uploads/excursions/ruble_icon.svg) no-repeat center;
            background-size: 24px 24px;
        }
        .excursions-detail__slider {
            width: calc(100% - 16px);
            margin: 0 -8px 32px;
        }
        .excursions-detail__slider-item {
            display: block;
        }
        .excursions-detail__slider-item img {
            width: 180px;
            height: 180px;
            border-radius: 4px;
        }


        /* End */
    </style>

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $single_excursion_data->name }}</h2>
            </div>
        </div>
    </div>
</div>







<div class="page-content room-detail">
    <div class="container">
        <div class="card flex-row " style="background-color: transparent;border-color: transparent;" >

                    <div class="" style="padding-right: 100px">

                        <img style="width: 450px;height: 250px" src=" {{ asset('uploads/excursions/'.$single_excursion_data->featured_photo) }}" alt="">
                        <div style="padding-top:8px;"></div>
                        <div class=" review-content">
                            <p class="mt-1 text-warning" style="margin-bottom:1px;" id="id_color1">
                                {{round($avgStar, 2)}}
                                @for($i=1; $i<=$avgStar1; $i++)
                                    <span><i class="fa fa-star text-warning" id="id_color1" ></i></span>
                                @endfor
                            </p>
                            <div class="text-danger" style="font-style: italic; margin-bottom:10px;" id="id_color2" >
                                {{ $reviewCount }}  {{trans_choice('отзыв|отзыва|отзывов',$reviewCount)}}
                            </div>
                        </div>

                        <div style="padding-top:8px;"></div>

                    </div>


            <div class=" ">
                <div class="" style="font-size: 20px;"  >
                    {{ $single_excursion_data->name }}
                </div>
                <div style="padding-top:8px;"></div>

                <div class="excursions-detail__schedule">
                    <div class="excursions-detail__schedule-content">
                        <div class="excursions-detail__schedule-item schedule-calendar-icon">
                            <div><div class="excursions-detail__schedule-title">Дни экскурсии</div>
                                @foreach ($single_excursion_data->whatdays as $whatday)
                                <div class="">{{$whatday->name}}</div>
                                @endforeach</div>
                        </div>
                        <div class="excursions-detail__schedule-item schedule-time-icon">
                            <div><div class="excursions-detail__schedule-title">Продолжит.</div>
                                <div class="">{{sum1_time($single_excursion_data->durationExcursion,'00:00')}} час.</div></div>
                        </div>
                        <div class="excursions-detail__schedule-item schedule-calendar-icon">
                            <div><div class="excursions-detail__schedule-title">График экскурсии</div>
                                <div class="">с {{$c_startDate}} по {{$c_finishDate}} год.</div></div>
                        </div>

                    </div>
                    <div class="excursions-detail__schedule-content">
                        <div class="excursions-detail__schedule-item schedule-hourglass-icon">
                            <div><div class="excursions-detail__schedule-title">Время проведения экскурсии</div>
                                @foreach ($single_excursion_data->durations as $duration)
                                    <div class="">{{sum1_time($duration->start,'00:00')}} - {{ sum1_time($duration->start,$single_excursion_data->durationExcursion)}} час.</div>
                                @endforeach</div>
                        </div>
                        <div class="excursions-detail__schedule-item schedule-marker-icon">
                            <div><div class="excursions-detail__schedule-title">Пункт сбора</div>
                                <div class="">{{$single_excursion_data->placeMeeting}}</div></div>
                        </div>
                    </div>
                    <div class="excursions-detail__schedule-content">
                        <div class="excursions-detail__schedule-item  ">
                            <i class="fa fa-bus" style="transform: scale(1.5,1.2);margin-right:10px"></i>
                            <div><div class="excursions-detail__schedule-title">Транспорт</div>
                                <div class="">{{$single_excursion_data->transport}}</div></div>
                        </div>

                    </div>


                    @foreach ($single_excursion_data->discounts as $discount)
                    <div class="excursions-detail__schedule-content ">
                        <div class="excursions-detail__schedule-item schedule-ruble-icon">
                            <div><div class="excursions-detail__schedule-title">{{$discount->name}} Скидка: {{$discount->discount}}% </div>
                                <div class="">{{$single_excursion_data->price - ($single_excursion_data->price * $discount->discount)/100}} руб.</div></div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

        В этой экскурсии вы посетите : @foreach ($single_excursion_data->placevisits as $placevisit)
            <div class="">{{$placevisit->name}}</div>
        @endforeach

        <div class=" " style="background-color: transparent;border-color: transparent;" >

        {!! $single_excursion_data->fullDescription !!}

            </div>




    <div class="widget" >
        <div class="container" style="width: 700px">
            <div class="card  " style="background-color: transparent;border-color: pink;box-shadow: 0 0 20px 0 #ddd;" >
            <h2>Забронируйте эту экскурсию</h2>
            <form action="{{ route('cartexcur_submit') }}" method="post">
                @csrf
                <input type="hidden" name="excursion_id" value="{{ $single_excursion_data->id }}">

                    <div class="input-group-addon mb_20 ">
                        <i class="fa fa-calendar" style="margin-right:5px"></i>
                        <label for="" style="margin-bottom:5px">Дата экскурсии</label>
                    <input class="form-control" id="date" name="date" data-date-end-date={{$c_finishDate}} data-date-days-Of-Week-Disabled={{$c_daysOfWeekDisabled}} data-date-days-Of-Week-Highlighted={{$c_daysOfWeekHighlighted}} placeholder="день.месяц.год" type="text"/>
                </div>
                <div class="form-group">
                    <i class="fa fa-clock-o" style="margin-right:5px"></i>
                    <label for="time_excur">Время экскурсии</label>
                    <select class="form-control" id="time_excur" name="time_excur">
                        <option>Выберите время экскурсии</option>
                        @foreach($single_excursion_data->durations as $duration)
                            <option value="{{sum1_time($duration->start,'00:00')}}">{{sum1_time($duration->start,'00:00')}} - {{ sum1_time($duration->start,$single_excursion_data->durationExcursion)  }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb_20">
                    <i class="fa fa-male" style="margin-right:5px"></i>
                    <label for="" style="margin-bottom:5px">Взрослые</label>
                    <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Взрослые">
                </div>
                <div class="form-group mb_20">
                    <label for="" style="margin-bottom:5px" >Пенсионеры</label>
                    <input type="number" name="pensioner" class="form-control" min="1" max="30" placeholder="Пенсионеры">
                </div>
                <div class="form-group mb_20">
                    <i class="fa fa-child" style="margin-right:5px"></i>
                    <label for="" style="margin-bottom:5px">Дети от 5 до 14 лет</label>
                    <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Дети от 5 до 14 лет">
                </div>
                <div class="form-group mb_20">
                    <i class="fa fa" style="margin-right:5px"></i>
                    <label for="" style="margin-bottom:5px">Дети до 5 лет</label>
                    <input type="number" name="kids" class="form-control" min="0" max="30" placeholder="Дети до 14 лет">
                </div>
                <button type="submit" class="btn btn-danger" id="id_btn_color1">Добавить в корзину</button>
            </form>
            </div>
          </div>
    </div>

    <!-- Display review section start -->
    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
        <div class="container">
            <div class="row mt-5">
                <h5>Секция комментов :</h5>
                <div class="col-sm-12 mt-5">
                    @foreach($single_excursion_data->ReviewexcurData as $review)
                        <div class=" review-content">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar ">
                            <span class="font-weight-bold ml-2">{{$review->name}}</span>
                            <p id ="id_color2" style="color:#e91e63;">Опубликован : {{$review->created_at->format('d.m.y h:m:s') }}</p>
                            <p class="mt-1">
                                @for($i=1; $i<=$review->star_rating; $i++)
                                    <span><i class="fa fa-star text-warning" id ="id_color1"></i></span>
                                @endfor
                                <span class="font ml-2">{{$review->email}}</span>
                            </p>
                            <p class="description ">
                                {{$review->comments}}
                            </p>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Review store Section -->
    <div class="container">
        <div class="row">
            <div class="col-sm-10 mt-4 ">
                <form class="py-2 px-4" action="{{route('reviewexcur.store')}}" style="box-shadow: 0 0 20px 0 #ddd;" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="excursion_id" value="{{$single_excursion_data->id}}">
                    <div class="row justify-content-end mb-1">
                        <div class="col-sm-8 float-right">
                            @if(Session::has('flash_msg_success'))
                                <div class="alert alert-success alert-dismissible p-2">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Удачно!</strong> {!! session('flash_msg_success')!!}.
                                </div>
                            @endif
                        </div>
                    </div>
                    <p class="font-weight-bold ">Отзывы</p>
                    <div class="form-group row">
                        <div class=" col-sm-6">
                            <input class="form-control" type="text" name="name" placeholder="Имя" maxlength="40" required/>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="email" name="email" placeholder="Адрес эл.почты" maxlength="80" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="phone" placeholder="Номер телефона" maxlength="40" required/>
                        </div>
                        <div class="col-sm-6">
                            <div class="rate">
                                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                <label for="star5"  title="text">5 stars</label>
                                <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                <label for="star4" id ="id_color1" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                <label for="star3" id ="id_color1" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" id ="id_color1" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                <label for="star1" id ="id_color1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-sm-12 ">
                            <textarea class="form-control" name="comment" rows="6 " placeholder="Коментарий" maxlength="200"></textarea>
                        </div>
                    </div>
                    <div class="mt-3 ">
                        <button class="btn py-2 px-3 btn-danger" id ="id_btn_color1">Подтведить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
    @php
        function sum1_time()
    {
    $i = 0;
    foreach (func_get_args() as $time) {
    sscanf($time, '%d:%d', $hour, $min);
    $i += $hour * 60 + $min;
    }
    if ($h = floor($i / 60)) {
    $i %= 60;
    }
    return sprintf('%02d:%02d', $h, $i);
    }
    @endphp


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

    <script>

        $(document).ready(function(){

            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
              //  daysOfWeekDisabled: [0,1,3,4,6],
              //  daysOfWeekHighlighted:[2,5],
              //  endDate:'15.12.2023',
                startDate: 'd',
                container: container,
                todayHighlight: true,
                autoclose: true,
                language:'ru',
                weekStart: 1,
                clearBtn:true,
                title:'Выберите возможную дату экскурсии',
            };
            $.fn.datepicker.dates['ru'] = {
                days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
                daysShort: ["Вск", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Суб"],
                daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
                today: "Сегодня",
                clear: "Очистить",
                format: "dd.mm.yyyy",
                weekStart: 1,
                monthsTitle: 'Месяцы',
                todayHighlight: true,

            };

            date_input.datepicker(options);
        })
    </script>
    };


@endsection
