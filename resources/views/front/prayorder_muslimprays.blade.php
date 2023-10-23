@extends('front.layout.app')

@section('main_content')
    <div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Заказать мусульманскую молитву</h2>
            </div>
        </div>
    </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <h1 class="h2">На этой странице можно заказать мусульманские молитвы</h1>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div>

                            <p>
                                Если не получается заказать молитвы через форму, присылайте их на почту test@mail.ru
                            </p>
                            <p>
                                После поступления молитва будет проверена и передана в выбранную мечеть, а Вы получите сообщение на почту.
                            </p>

                        </div>

                    </div>

                    @if($errors->any())
                        @foreach($errors->all() as $error)

                        @endforeach
                    @endif
                    <form method="post" action="/prayorder/muslimpray">
                        @csrf
                        <div class="form-group">
                            <label for="title">Ваше имя</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name')}}">
                        </div>
                        <div style ="margin-bottom:10px "> </div>
                        <div class="form-group">
                            <label for="text">Ваш e-mail</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email')}}">
                        </div>
                        <div style ="margin-bottom:10px "> </div>
                        <div class="form-group">
                            <label for="muslimprays">Вид молитвы</label>
                            <select class="form-control" id="treb" name="muslimpray">
                                <option>Выберите вид</option>
                                @foreach($all_muslimprays as $muslimpray)
                                    <option value="{{ $muslimpray->id }}">{{ $muslimpray->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style ="margin-bottom:10px "> </div>
                        <div class="form-group">
                            <label for="body" >Список имен</label>
                            <div class="mt-1">
                                <textarea id="list_name" rows="10" name="list_name" class="form-control ">

                                </textarea>
                            </div>
                        </div>
                        <div style ="margin-bottom:10px "> </div>
                        <div class="form-group">
                            <label for="mosques">Название мечети</label>
                            <select class="form-control" id="mosque" name="mosque">
                                <option>Выберите мечеть</option>
                                @foreach($all_mosques as $mosque)
                                    <option value="{{ $mosque->id }}">{{ $mosque->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        </br>
                        <button type="submit" class="btn btn-success">Отправить</button>

                    </form>


                </main>
            </div>
        </div>
    </div>


@endsection
