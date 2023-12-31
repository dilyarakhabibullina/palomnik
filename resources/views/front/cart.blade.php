@extends('front.layout.app')

@section('main_content')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>


    <div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->cart_heading }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">


                @if(session()->has('cart_room_id'))

                <div class="table-responsive">
                    <table class="table table-bordered table-cart">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Номер</th>
                                <th>Фото</th>
                                <th>Информация о комнате</th>
                                <th>Цена/ночь</th>
                                <th>Заезд</th>
                                <th>Выезд</th>
                                <th>Гости</th>
                                <th>Промежуточный итог</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $arr_cart_room_id = array();
                            $i=0;
                            foreach(session()->get('cart_room_id') as $value) {
                                $arr_cart_room_id[$i] = $value;
                                $i++;
                            }

                            $arr_cart_checkin_date = array();
                            $i=0;
                            foreach(session()->get('cart_checkin_date') as $value) {
                                $arr_cart_checkin_date[$i] = $value;
                                $i++;
                            }

                            $arr_cart_checkout_date = array();
                            $i=0;
                            foreach(session()->get('cart_checkout_date') as $value) {
                                $arr_cart_checkout_date[$i] = $value;
                                $i++;
                            }

                            $arr_cart_adult = array();
                            $i=0;
                            foreach(session()->get('cart_adult') as $value) {
                                $arr_cart_adult[$i] = $value;
                                $i++;
                            }

                            $arr_cart_children = array();
                            $i=0;
                            foreach(session()->get('cart_children') as $value) {
                                $arr_cart_children[$i] = $value;
                                $i++;
                            }

                            $total_roomprice = 0;
                            for($i=0;$i<count($arr_cart_room_id);$i++)
                            {
                                $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('cart_delete',$arr_cart_room_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Вы уверены?');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>{{ $i+1 }}</td>
                                    <td><img src="{{ asset('uploads/'.$room_data->featured_photo) }}"></td>
                                    <td>
                                        <a href="{{ route('room_detail',$room_data->id) }}" class="room-name">{{ $room_data->name }}</a>
                                    </td>
                                    <td>₽{{ $room_data->price }}</td>
                                    <td>{{ $arr_cart_checkin_date[$i] }}</td>
                                    <td>{{ $arr_cart_checkout_date[$i] }}</td>
                                    <td>
                                        Взрослые: {{ $arr_cart_adult[$i] }}<br>
                                        Дети: {{ $arr_cart_children[$i] }}
                                    </td>
                                    <td>
                                    @php
                                        $d1 = explode('/',$arr_cart_checkin_date[$i]);
                                        $d2 = explode('/',$arr_cart_checkout_date[$i]);
                                        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                        $t1 = strtotime($d1_new);
                                        $t2 = strtotime($d2_new);
                                        $diff = ($t2-$t1)/60/60/24;
                                        echo '₽'.$room_data->price*$diff;
                                    @endphp
                                    </td>
                                </tr>
                                @php
                                $total_roomprice = $total_roomprice+($room_data->price*$diff);
                            }
                            @endphp
                            <tr>
                                <td colspan="8" class="tar">Всего за комнаты:</td>
                                <td>₽{{ $total_roomprice }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif

                    @if(session()->has('cart_book_id'))

                        <div class="table-responsive">
                            <table class="table table-bordered table-cart">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Номер</th>
                                    <th>Фото</th>
                                    <th>Наименование</th>
                                    <th>Цена/шт</th>
                                    <th></th>
                                    <th>Кол-во</th>
                                    <th>Год издания</th>
                                    <th>Промежуточный итог </th>
                                </tr>
                                </thead>
                                <tbody>

                                @php
                                    $arr_cart_book_id = array();
                                    $i=0;
                                    $a=0;
                                    foreach(session()->get('cart_book_id') as $value) {
                                        $arr_cart_book_id[$i] = $value;
                                        $i++;
                                    }

                                    $total_bookprice = 0;
                                    for($i=0;$i<count($arr_cart_book_id);$i++)
                                    {
                                        $book_data = DB::table('books')->where('id',$arr_cart_book_id[$i])->first();
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('cartbook_delete',$arr_cart_book_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Вы уверены?');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>{{ $i+1 }}</td>
                                    <td><img style="width: 70px;height: 100px" src="{{ asset('uploads/books/'.$book_data->featured_photo) }}"></td>
                                    <td>
                                        {{ $book_data->title }}
                                    </td>
                                    <td>₽{{ $book_data->price }}</td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="stepper stepper--style-1 js-spinner">
                                            <input autofocus type="number" name="abc" min="0" max="100" step="1" value="1" class="stepper__input">
                                        </div>
                                    </td>
                                    <td>

                                        {{ $book_data->published }}
                                    </td>
                                    <td>
                                        @php

                                            echo '₽'.$book_data->price;
                                        @endphp
                                    </td>
                                </tr>
                                @php
                                    $total_bookprice = $total_bookprice+($book_data->price);
                                }
                                @endphp
                                <tr>
                                    <td colspan="8" class="tar">Всего за книги:</td>
                                    <td>₽{{ $total_bookprice }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                    @if(session()->has('cart_excursion_id'))

                        <div class="table-responsive">
                            <table class="table table-bordered table-cart">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Номер</th>
                                    <th>Фото</th>
                                    <th>Информация о экскурсии</th>
                                    <th>Цена/чел.</th>
                                    <th>Дата</th>
                                    <th>Период</th>
                                    <th>Гости</th>
                                    <th>Промежуточный итог</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php
                                    $arr_cart_excursion_id = array();
                                    $i=0;
                                    foreach(session()->get('cart_excursion_id') as $value) {
                                        $arr_cart_excursion_id[$i] = $value;
                                        $i++;
                                    }

                              /*     $arr_cart_checkin_date = array();
                                   $i=0;
                                    foreach(session()->get('cart_checkin_date') as $value) {
                                        $arr_cart_checkin_date[$i] = $value;
                                       $i++;
                                   }
                              */
                              /*
                                    $arr_cart_checkout_date = array();
                                    $i=0;
                                    foreach(session()->get('cart_checkout_date') as $value) {
                                        $arr_cart_checkout_date[$i] = $value;
                                        $i++;
                                    }
                                */
                                    $arr_cart_adult_excur = array();

                                    $i=0;
                                    foreach(session()->get('cart_adult_excur') as $value) {
                                        $arr_cart_adult_excur[$i] = $value;
                                        $i++;
                                    }

                                    $arr_cart_children_excur = array();
                                    $i=0;
                                    foreach(session()->get('cart_children_excur') as $value) {
                                        $arr_cart_children_excur[$i] = $value;
                                        $i++;
                                    }

                                    $arr_cart_pensioner = array();
                                    $i=0;
                                    foreach(session()->get('cart_pensioner') as $value) {
                                        $arr_cart_pensioner[$i] = $value;
                                        $i++;
                                    }

                                    $arr_cart_kids = array();
                                    $i=0;
                                    foreach(session()->get('cart_kids') as $value) {
                                        $arr_cart_kids[$i] = $value;
                                        $i++;
                                    }

                                    $arr_cart_date = array();
                                    $i=0;
                                    foreach(session()->get('cart_date') as $value) {
                                        $arr_cart_date[$i] = $value;
                                        $i++;
                                    }

                                    $arr_cart_time_excur = array();
                                    $i=0;
                                    foreach(session()->get('cart_time_excur') as $value) {
                                        $arr_cart_time_excur[$i] = $value;
                                        $i++;
                                    }


                                    $total_excursionprice = 0;
                                    for($i=0;$i<count($arr_cart_excursion_id);$i++)
                                    {
                                        $discounts = App\Models\Discount::get();
                                        $excursion_data = App\Models\Excursion::with('discounts')->where('id',$arr_cart_excursion_id[$i])->first();

                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('cartexcur_delete',$arr_cart_excursion_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Вы уверены?');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>{{ $i+1 }}</td>
                                    <td><img src="{{ asset('uploads/excursions/'.$excursion_data->featured_photo) }}"></td>
                                    <td>
                                        {{ $excursion_data->name }}
                                    </td>
                                    <td>₽{{ $excursion_data->price }}</td>

                                    <td> {{ $arr_cart_date[$i] }} </td>

                                    <td> {{ $arr_cart_time_excur[$i] }} - {{ sum7_time($arr_cart_time_excur[$i],$excursion_data->durationExcursion)}}

                                    </td>
                                    <td>
                                        Взрослые: {{ $arr_cart_adult_excur[$i] }}<br>
                                        Пенсионеры: {{ $arr_cart_pensioner[$i] }}<br>
                                        Дети от 5 до 14 лет: {{ $arr_cart_children_excur[$i] }}<br>
                                        Дети до 5 лет: {{ $arr_cart_kids[$i] }}<br>
                                    </td>
                                    <td>
                                        @php
                                        foreach ($excursion_data->discounts as $discount){

                                        $adult =  $excursion_data->price - ($excursion_data->price * $discounts[0]->discount)/100  ;
                                        $pensioner= $excursion_data->price - ($excursion_data->price * $discounts[2]->discount)/100  ;
                                        $children = $excursion_data->price - ($excursion_data->price * $discounts[1]->discount)/100  ;
                                        $kids = $excursion_data->price - ($excursion_data->price * $discounts[3]->discount)/100  ;
                                          }


                                        @endphp
                                         {{$adult}} * {{ $arr_cart_adult_excur[$i] }} = {{$sum_adult = $adult * $arr_cart_adult_excur[$i] }} руб. <br>
                                         {{$pensioner}} * {{ $arr_cart_pensioner[$i] }} = {{$sum_pensioner =$pensioner * $arr_cart_pensioner[$i]  }} руб. <br>
                                         {{$children}} * {{ $arr_cart_children_excur[$i] }} = {{$sum_children = $children *  $arr_cart_children_excur[$i] }} руб. <br>
                                         {{$kids}} * {{ $arr_cart_kids[$i] }} = {{$sum_kids = $kids *  $arr_cart_kids[$i] }} руб. <br>
                                    </td>
                                </tr>
                                @php
                                    $total_excursionprice = $total_excursionprice + ($sum_adult + $sum_pensioner + $sum_children + $sum_kids);
                                }
                                @endphp
                                <tr>
                                    <td colspan="8" class="tar">Всего за экскурсии:</td>
                                    <td>₽{{ $total_excursionprice }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif


                @if(session()->has('cart_book_id') or session()->has('cart_room_id') or session()->has('cart_excursion_id'))
                        @php
                        if(!isset( $total_roomprice)){
                              $total_roomprice =0;
                         }
                          if(!isset( $total_bookprice)){
                              $total_bookprice =0;
                         }
                          if(!isset( $total_excursionprice)){
                              $total_excursionprice =0;
                         }

                        @endphp
                        Всего к оплате:  ₽{{ $total_roomprice + $total_bookprice + $total_excursionprice}}

                <div class="checkout mb_20">
                    <a href="{{ route('checkout') }}" class="btn btn-primary bg-website">Оформить заказ</a>
                </div>
                @endif

                    @if(!session()->has('cart_book_id') and !session()->has('cart_room_id') and !session()->has('cart_excursion_id'))
                <div class="text-danger mb_30">
                    Корзина пустая!
                </div>
                    @endif


            </div>
        </div>
    </div>
</div>
@endsection
<script src="js/stepper.min.js"></script>
@php
    function sum7_time()
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
