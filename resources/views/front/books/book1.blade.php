@extends('front.layout.app')

@section('main_content')
    <div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Заказать религиозные книги</h2>
            </div>
        </div>
    </div>
    </div>

    <div class="room-content">
        <div class="container">
            <div class="row">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <h1 class="h2">Вы можете на этой странице заказать религиозные книги</h1>


                    @if($errors->any())
                        @foreach($errors->all() as $error)

                        @endforeach
                    @endif


                    <div class="row">

                    <div class="row">
                        @foreach($books as $book)

                            <div class="col-md-3">
                                <div class="inner">
                                    <div class="photo">
                                        <div class="photo" style="width: 150px;height: 160px">
                                            <img src="{{ asset('uploads/books/'.$book->cover) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <div class="">
                                          Название: {{ $book->title }}
                                        </div>
                                        <div class="">
                                            Автор:
                                            @foreach ($book->authors as $author)
                                                {{$author->fullname}}
                                            @endforeach
                                        </div>
                                        <div class="">
                                            Издательство:
                                            @foreach ($book->publishers as $publisher)
                                                {{$publisher->name}}
                                            @endforeach
                                        </div>
                                        <div class="price">
                                         Цена: {{ $book->price }} руб
                                        </div>
                                        <div class="">
                                         Всего: {{ $book->pages }} стр
                                        </div>
                                        <div class="">
                                            Год издания: {{ $book->published }} год
                                        </div>

                                        <div class="button">
                                            <a href="{{ route('book_detail',$book->id) }}" class="btn btn-primary">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                            <div class="flex">
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
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 p-2.5" placeholder="0 " type="number" name="priceMin">
                                            <span class="mx-4 text-gray-500">до</span>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  pl-10 p-2.5" placeholder="1,0000" type="number" name="priceMax">
                                        </div>
                                    </artical> <!-- filter-group .// -->
                                    <artical class="filter-group">
                                        <div class="flex items-center mr-5">
                                            <label>Год издания</label>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 p-2.5" placeholder="0 " type="number" name="publishedMin">
                                            <span class="mx-4 text-gray-500">до</span>
                                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  pl-10 p-2.5" placeholder="2050" type="number" name="publishedMax">
                                        </div>
                                    </artical> <!-- filter-group .// -->
                                    <div class="row">
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Подтвердить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                    </div>



                </main>
            </div>
        </div>
    </div>


@endsection
