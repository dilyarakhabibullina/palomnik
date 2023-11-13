@extends('front.layout.app')

@section('main_content')
    <style>

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
        /* End */
    </style>


<div class="page-top">
    <div class="bg"  ></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Заказать экскурсии</h2>
            </div>
        </div>
    </div>
</div>
    <div class="home-rooms">
<div class="page-content room-detail  " style="background-color:lightgrey ;">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left ">



                @foreach($excursions as $excursion)
@php
                                {{$avgStar = App\Models\ReviewexcurRating::where ('excursion_id',$excursion->id)->pluck('star_rating')->avg();}}
                    {{  $avgStar1= round($avgStar);}}
 {{$reviewCount = App\Models\ReviewexcurRating::where ('excursion_id',$excursion->id)->pluck('excursion_id')->count();}}

@endphp

<div class="col-md-3">
<div class="card flex-row inner; " style="border-color: pink;box-shadow: 0 0 20px 0 #ddd;width: 820px;height: 420px ;padding:.5rem 1rem;margin-bottom:30px;border-radius: 30px;">
<div class="photo " >
<div class="photo" style= margin-bottom:10px;">
<img style="width: 160px;height: 230px" src="{{ asset('uploads/excursions/'.$excursion->featured_photo) }}" alt="">
                                </div>


                                    <div class=" review-content">
                                        <p class="mt-1 text-warning" id ="id_color1" style="margin-bottom:1px;">
                                            {{round($avgStar, 2)}}
                                            @for($i=1; $i<=$avgStar1; $i++)
                                                <span><i class="fa fa-star text-warning" id ="id_color1"></i></span>
                                            @endfor
                                        </p>
                                        <div class="text-danger" style="font-style: italic; margin-bottom:20px;" id="id_color2" >
                                            {{ $reviewCount }}  {{trans_choice('отзыв|отзыва|отзывов',$reviewCount)}}
                                        </div>
                                    </div>


                                <div class="button">
                                    <a href="{{ route('excursion_detail',$excursion->id) }}" class="btn btn-danger" id="id_btn_in_details" >Подробнее</a>
                                </div>
                            </div>
                            <div class="text" style="width: 600px;height: 200px ;padding:10px 10px;margin-bottom:50px;">
                                <div class="" style="font-size: 20px;"  >
                                     {{ $excursion->name }}
                                </div>
                                <div style="padding-top:5px;"></div>
                                <div class="text-danger" id ="id_color1" style="font-style: italic;">
                                    <td  style="font-weight: bold;padding-right: 6px"><strong>Продолжительность:</strong> </td>
                                    <td>{{sum4_time($excursion->durationExcursion,'00:00') }} час. ;</td>
                                </div>
                                <div style="padding-top:5px;"></div>
                                <div class="text-danger" id ="id_color1" style="font-style: italic;">
                                    <td style="font-weight: bold;padding-right: 6px"><strong>График экскурсий:</strong> </td>
                                    <td> начало с {{date('d.m.y', strtotime($excursion->startDateExcursion))}} год. до {{date('d.m.y', strtotime($excursion->finishDateExcursion))}} год. ;</td>
                                </div>
                                <div style="padding-top:5px;"></div>
                                <div class="text-danger" id ="id_color1" style="font-style: italic;">
                                    <td style="font-weight: bold;padding-right: 6px"><strong>Период:</strong> </td>
                                    @foreach ($excursion->durations as $duration)
                                    {{sum4_time($duration->start,'00:00')}} - {{ sum4_time($duration->start,$excursion->durationExcursion)}} час. ;
                                    @endforeach
                                </div>
                                <div style="padding-top:5px;"></div>
                                <div class="text-danger" id ="id_color1" style="font-style: italic; ">
                                    <td style="font-weight: bold;padding-right: 6px"><strong>По каким дням:</strong> </td>
                                    @foreach ($excursion->whatdays as $whatday)
                                        {{$whatday->name}} ;
                                    @endforeach
                                </div>
                                <div style="padding-top:8px;"></div>
                                <table style="width: 600px;height: 160px ">
                                    <tbody>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 4px">Скидки: </td>
                                        <td>@foreach ($excursion->discounts as $discount)
                                                {{$discount->name}}:{{$discount->discount}}% ;
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 4px">Цена: </td>
                                        <td>&#8381;{{ $excursion->price }} за одного человека (без скидок)</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 4px">Транспорт: </td>
                                        <td>{{ $excursion->transport }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 4px">Места посещений: </td>
                                        <td>@foreach ($excursion->placevisits as $placevisit)
                                                {{$placevisit->name}} ;
                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div style="padding-top:5px;"></div>
                                <div class="" >
                                    {!! $excursion->description !!}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card col-lg-4 col-md-5 col-sm-12 right inner" style="background-color: white;border-color: pink; box-shadow: 0 0 20px 0 #ddd;border-radius: 30px;">

                <div class="sidebar-container " id="sticky_sidebar" style="background-color:white ;border-color: pink;box-shadow: 0 0 20px 0 #ddd;border-radius: 30px;">


                    <form method="get" action="{{ url()->current() }}">

                        <article class="filter-group ">
                            <header class="card-header ">
                                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true">

                                    <h6 class="title text-danger" id="id_color1">Название экскурсии</h6>
                                </a>
                            </header>

                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text " class="form-control" placeholder="Введите название экскурсии" name="name">
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->


                        <artical class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                    <h6 class="title" id="id_color1">Дни экскурсий</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_2" style="">
                                <div class="card-body">

                                    @foreach($whatdays as $whatday)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox"  class="custom-control-input" name="whatdays[]" value="{{$whatday->id}}">
                                            {{$whatday->name}}
                                        </label>
                                    @endforeach


                                </div> <!-- card-body.// -->
                            </div>
                        </artical> <!-- filter-group .// -->
                        <artical class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                    <h6 class="title text-danger" id="id_color1" >Места посещений</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_2" style="">
                                <div class="card-body">

                                    @foreach($placevisits as $placevisit)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox"  class="custom-control-input" name="placevisits[]" value="{{$placevisit->id}}">
                                            {{$placevisit->name}}
                                        </label>
                                    @endforeach


                                </div> <!-- card-body.// -->
                            </div>
                        </artical> <!-- filter-group .// -->

                        <artical class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                    <h6 class="title text-danger" id="id_color1" >Стоимость в рублях</h6>
                                </a>
                            </header>
                            <div class="flex items-center mr-5">
                                <label>от </label>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 p-2.5" style="width:100px" placeholder="0 " type="number" name="priceMin">
                                <span class="mx-1 text-gray-500"> до </span>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  pl-10 p-2.5" style="width:100px" placeholder="10000" type="number" name="priceMax"> руб.
                            </div>
                        </artical> <!-- filter-group .// -->
                        <div style="padding-top:8px;"></div>
                        <artical class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                    <h6 class="title text-danger" id="id_color1" >Продолжительность в часах</h6>
                                </a>
                            </header>
                            <div class="flex items-center mr-5">
                                <label>от </label>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 p-2.5" style="width:100px" placeholder="0 " type="time" name="durationExcursionMin">
                                <span class="mx-1 text-gray-500"> до </span>

                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  pl-10 p-2.5" style="width:100px" placeholder="300" type="time" name="durationExcursionMax"> час.
                            </div>
                        </artical> <!-- filter-group .// -->
                        <div class="row">
                            <div style="padding-top:8px;"></div>
                            <div class="mb-4">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-danger" id ="id_btn_color1" >Найти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            </div>
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

    @php
        function sum4_time()
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



@endsection
