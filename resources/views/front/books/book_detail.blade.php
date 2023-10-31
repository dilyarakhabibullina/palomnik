@extends('front.layout.app')

@section('main_content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


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
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $single_book_data->title }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content room-detail">
    <div class="container">
        <div class="card flex-row " style="background-color: transparent;border-color: transparent;" >

                    <div class="" style="padding-right: 100px">

                        <img style="width: 210px;height: 260px" src=" {{ asset('uploads/books/'.$single_book_data->featured_photo) }}" alt="">

                        <div class=" review-content">
                            <p class="mt-1 text-warning" style="margin-bottom:1px;">
                                {{ $avgStar }}
                                @for($i=1; $i<=$avgStar1; $i++)
                                    <span><i class="fa fa-star text-warning"></i></span>
                                @endfor
                            </p>
                            <div class="text-primary" style="font-style: italic; margin-bottom:10px;"  >
                                {{ $reviewCount }}  {{trans_choice('отзыв|отзыва|отзывов',$reviewCount)}}
                            </div>

                        </div>

                    </div>


            <div class=" ">
                <div class="" style="font-size: 20px;"  >
                    {{ $single_book_data->title }}
                </div>
                <div style="padding-top:8px;"></div>
                <div class="price">
                    Автор:
                    @foreach ($single_book_data->authors as $author)
                        {{$author->fullname}}
                    @endforeach
                </div>
                <div class="price">
                    Издательство:
                    @foreach ($single_book_data->publishers as $publisher)
                        {{$publisher->name}}
                    @endforeach
                </div>

                <div class="price">
                    Цена: {{ $single_book_data->price }} руб
                </div>
                <div class="price">
                    Всего: {{ $single_book_data->pages }} стр
                </div>
                <div class="price">
                    Год издания: {{ $single_book_data->published }} год
                </div>

                <div class="price">
                    Жанр:
                    @foreach ($single_book_data->genres as $genre)
                        {{$genre->name}}
                    @endforeach
                </div>
                <div class="price">
                    Язык:
                    @foreach ($single_book_data->langs as $lang)
                        {{$lang->name}}
                    @endforeach
                </div>

                <div class="price">
                    Религия:
                    @foreach ($single_book_data->religions as $religion)
                        {{$religion->name}}
                    @endforeach
                </div>


            </div>

        </div>

        <div class="widget">
            <h2>Заказать эту книгу</h2>
            <form action="{{ route('cartbook_submit') }}" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $single_book_data->id }}">
                <button type="submit" class="btn btn-primary">Добавить в корзину</button>
            </form>
        </div>

        <div class="card flex-row " style="background-color: transparent;border-color: transparent;" >

        {!! $single_book_data->fullDescription !!}

            </div>

    <!-- Display review section start -->
    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
        <div class="container">
            <div class="row mt-5">
                <h5>Секция комментов :</h5>
                <div class="col-sm-12 mt-5">
                    @foreach($single_book_data->ReviewData as $review)
                        <div class=" review-content">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar ">
                            <span class="font-weight-bold ml-2">{{$review->name}}</span>
                            <p style="color:#e91e63;">Опубликован : {{$review->created_at->format('d.m.y h:m:s') }}</p>
                            <p class="mt-1">
                                @for($i=1; $i<=$review->star_rating; $i++)
                                    <span><i class="fa fa-star text-warning"></i></span>
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
                <form class="py-2 px-4" action="{{route('review.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$single_book_data->id}}">
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
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-sm-12 ">
                            <textarea class="form-control" name="comment" rows="6 " placeholder="Коментарий" maxlength="200"></textarea>
                        </div>
                    </div>
                    <div class="mt-3 ">
                        <button class="btn btn-sm py-2 px-3 btn-info">Подтведить
                        </button>
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
