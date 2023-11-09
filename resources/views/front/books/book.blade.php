@extends('front.layout.app')

@section('main_content')
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
        /* End */
    </style>


<div class="page-top">
    <div class="bg"  ></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Заказать религиозные книги</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content room-detail  " style="background-color:lightgrey ;">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left ">



                @foreach($books as $book)
@php
                                {{$avgStar = App\Models\ReviewRating::where ('book_id',$book->id)->pluck('star_rating')->avg();}}
                    {{  $avgStar1= round($avgStar);}}
 {{$reviewCount = App\Models\ReviewRating::where ('book_id',$book->id)->pluck('book_id')->count();}}

@endphp

<div class="col-md-3">
<div class="card flex-row ; " style="width: 710px;height: 420px ;padding:.5rem 1rem;margin-bottom:30px;border-radius: 30px;">
<div class="photo " >
<div class="photo" style= margin-bottom:10px;">
<img style="width: 160px;height: 230px" src="{{ asset('uploads/books/'.$book->featured_photo) }}" alt="">
                                </div>


                                    <div class=" review-content">
                                        <p class="mt-1 text-warning" style="margin-bottom:1px;">
                                            {{round($avgStar, 2)}}
                                            @for($i=1; $i<=$avgStar1; $i++)
                                                 <span><i class="fa fa-star text-warning"></i></span>
                                            @endfor
                                        </p>
                                        <div class="text-primary" style="font-style: italic; margin-bottom:20px;"  >
                                            {{ $reviewCount }}  {{trans_choice('отзыв|отзыва|отзывов',$reviewCount)}}
                                        </div>
                                    </div>


                                <div class="button">
                                    <a href="{{ route('book_detail',$book->id) }}" class="btn btn-primary">Подробнее</a>
                                </div>
                            </div>
                            <div class="text" style="width: 600px;height: 200px ;padding:10px 10px;margin-bottom:50px;">
                                <div class="" style="font-size: 20px;"  >
                                     {{ $book->title }}
                                </div>
                                <div style="padding-top:8px;"></div>
                                <div class="text-primary" style="font-style: italic;">

                                    @foreach ($book->authors as $author)
                                        {{$author->fullname}}
                                    @endforeach
                                </div>
                                <div style="padding-top:8px;"></div>
                                <table style="width: 500px;height: 200px ">
                                    <tbody>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 6px">Жанры: </td>
                                        <td>@foreach ($book->genres as $genre)
                                                {{$genre->name}}
                                            @endforeach
                                          </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 6px">Издательство: </td>
                                        <td>@foreach ($book->publishers as $publisher)
                                                {{$publisher->name}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 6px">Язык: </td>
                                        <td>@foreach ($book->langs as $lang)
                                                {{$lang->name}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 6px">Религия: </td>
                                        <td>@foreach ($book->religions as $religion)
                                                {{$religion->name}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 6px">Цена: </td>
                                        <td>{{ $book->price }} руб</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 6px">Всего: </td>
                                        <td>{{ $book->pages }} стр</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;padding-right: 6px">Год издания: </td>
                                        <td>{{ $book->published }} год</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div style="padding-top:8px;"></div>
                                <div class="" >
                                    {!! $book->description !!}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card col-lg-4 col-md-5 col-sm-12 right ">

                <div class="sidebar-container" id="sticky_sidebar">


                        <form method="get" action="{{ url()->current() }}">

                            <article class="filter-group">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true">

                                        <h6 class="title">Название книги</h6>
                                    </a>
                                </header>

                                <div class="filter-content collapse show" id="collapse_1" style="">
                                    <div class="card-body">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Введите название книги" name="title">
                                        </div>
                                    </div> <!-- card-body.// -->
                                </div>
                            </article> <!-- filter-group .// -->

                            <artical class="filter-group">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                        <h6 class="title">Издательство</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse_2" style="">
                                    <div class="card-body">

                                        @foreach($publishers as $publisher)
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox"  class="custom-control-input" name="publishers[]" value="{{$publisher->id}}">
                                                {{$publisher->name}}
                                            </label>
                                        @endforeach


                                    </div> <!-- card-body.// -->
                                </div>
                            </artical> <!-- filter-group .// -->
                            <artical class="filter-group">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                        <h6 class="title">Язык</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse_2" style="">
                                    <div class="card-body">

                                        @foreach($langs as $lang)
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox"  class="custom-control-input" name="langs[]" value="{{$lang->id}}">
                                                {{$lang->name}}
                                            </label>
                                        @endforeach


                                    </div> <!-- card-body.// -->
                                </div>
                            </artical> <!-- filter-group .// -->
                            <artical class="filter-group">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                        <h6 class="title">Религия</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse_2" style="">
                                    <div class="card-body">

                                        @foreach($religions as $religion)
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox"  class="custom-control-input" name="religions[]" value="{{$religion->id}}">
                                                {{$religion->name}}
                                            </label>
                                        @endforeach


                                    </div> <!-- card-body.// -->
                                </div>
                            </artical>
                            <!-<artical class="filter-group">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">

                                        <h6 class="title">Жанр</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse_2" style="">
                                    <div class="card-body">

                                        @foreach($genres as $genre)
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox"  class="custom-control-input" name="genres[]" value="{{$genre->id}}">
                                                {{$genre->name}}
                                            </label>
                                        @endforeach
                                    </div> <!-- card-body.// -->
                                </div>
                            </artical> <!-- filter-group .// -->
                            <artical class="filter-group">
                                <div class="flex items-center mr-5">
                                    <label>Стоимость от</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 p-2.5" style="width:100px" placeholder="0 " type="number" name="priceMin">
                                    <span class="mx-1 text-gray-500">до</span>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  pl-10 p-2.5" style="width:100px" placeholder="10000" type="number" name="priceMax">
                                </div>
                            </artical> <!-- filter-group .// -->
                            <div style="padding-top:8px;"></div>
                            <artical class="filter-group">
                                <div class="flex items-center mr-5">
                                    <label>Год издания</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 p-2.5" style="width:100px" placeholder="0 " type="number" name="publishedMin">
                                    <span class="mx-1 text-gray-500">до</span>

                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  pl-10 p-2.5" style="width:100px" placeholder="2050" type="number" name="publishedMax">
                                </div>
                            </artical> <!-- filter-group .// -->
                            <div class="row">
                                <div style="padding-top:8px;"></div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Найти</button>
                                </div>
                            </div>
                        </form>
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

@endsection
