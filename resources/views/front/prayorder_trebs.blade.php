@extends('front.layout.app')

@section('main_content')
    <div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Заказать православные требы</h2>
            </div>
        </div>
    </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <h1 class="h2">Вы можете на этой странице заказать требы</h1>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div>
                            <h5 class="h5 text-info">
                                !!Братья и сестры, просим внимательно относиться к заказу поминовений! Принимаются имена
                                <strong class=" text-primary"> только крещеных христиан православного вероисповедания.</strong>
                            </h5>
                            <p>
                                Если у вас возникли какие-либо сомнения относительно людей, имена которых вы бы хотели подать для поминовения , после списка имен обязательно кратко опишите ситуацию.
                            </p>
                            <p>
                                 Имена пишутся в родительном падеже (пример: Василия, Елены) по одному имени в строке или через запятую.
                            </p>
                            <p>
                                Ребенок до семи лет в записке упоминается как младенец — младенца Петра. Ребенок от 7 до 14 лет упоминается как отрок — отрока Иоанна. В записках о здравии перед именем можно упомянуть «болящего», «воина», «путешествующего», «заключенного» и т.д.
                            </p>
                            <p>
                                В записках о упокоении усопший в течение сорока дней после кончины именуется «новопреставленный».
                            </p>
                            <p>
                                На молебны записки подаются только <strong style="color: #ff0000">о ЗДРАВИИ.</strong>
                            </p>
                             <p>
                                  <strong>О УПОКОЕНИИ</strong>  можно подать на проскомидию, заказать поминовение, сугубую ектению, панихиду и сорокоуст.
                             </p>
                            <p>
                               <strong>ПОСТАРАЙТЕСЬ ЗАКАЗЫВАТЬ ТРЕБЫ ЗАРАНЕЕ</strong> , чтоб мы вовремя успели обработать заявку, администратор работает по графику 2 на 2.
                            </p>
                            <p>
                                <strong style="color: #ff0000" > ДЛЯ ЗАКАЗА ТРЕБЫ </strong> пишите в форму:
                            </p>
                            <p>
                            <ul>
                                <li>свое имя,</li>
                                <li>емейл,</li>
                                <li>название требы(если молебен, то кому) + (<strong>обязательно укажите о здравии или о упокоении</strong>)</li>
                                <li>список имен + (примечание при необходимости).</li>
                                <li>название церкви.</li>
                            </ul>
                            </p>
                            <p>
                                Если не получается заказать требы через форму, присылайте их на почту test@mail.ru
                            </p>
                            <p>
                                После поступления треба будет проверена и передана в выбранный монастырь. А вы получите сообщение на почту.
                            </p>

                        </div>

                    </div>

                    @if($errors->any())
                        @foreach($errors->all() as $error)

                        @endforeach
                    @endif
                    <form method="post" action="/prayorder/trebi">
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
                            <label for="trebs">Название требы</label>
                            <select class="form-control" id="treb" name="treb">
                                <option>Выберите требу</option>
                                @foreach($all_trebs as $treb)
                                    <option value="{{ $treb->id }}">{{ $treb->name }}</option>
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
                            <label for="churches">Название церкви</label>
                            <select class="form-control" id="church" name="church">
                                <option>Выберите церковь</option>
                                @foreach($all_churches as $church)
                                    <option value="{{ $church->id }}">{{ $church->name }}</option>
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
