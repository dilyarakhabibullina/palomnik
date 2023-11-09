@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->checkout_heading }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 checkout-left">

                <form action="{{ route('payment') }}" method="post" class="frm_checkout">
                    @csrf
                    <div class="billing-info">
                        <h4 class="mb_30">Платежная информация</h4>
                        @php
                        if(session()->has('billing_name')) {
                            $billing_name = session()->get('billing_name');
                        } else {
                            $billing_name = Auth::guard('customer')->user()->name;
                        }

                        if(session()->has('billing_email')) {
                            $billing_email = session()->get('billing_email');
                        } else {
                            $billing_email = Auth::guard('customer')->user()->email;
                        }

                        if(session()->has('billing_phone')) {
                            $billing_phone = session()->get('billing_phone');
                        } else {
                            $billing_phone = Auth::guard('customer')->user()->phone;
                        }

                        if(session()->has('billing_country')) {
                            $billing_country = session()->get('billing_country');
                        } else {
                            $billing_country = Auth::guard('customer')->user()->country;
                        }

                        if(session()->has('billing_address')) {
                            $billing_address = session()->get('billing_address');
                        } else {
                            $billing_address = Auth::guard('customer')->user()->address;
                        }

                        if(session()->has('billing_state')) {
                            $billing_state = session()->get('billing_state');
                        } else {
                            $billing_state = Auth::guard('customer')->user()->state;
                        }

                        if(session()->has('billing_city')) {
                            $billing_city = session()->get('billing_city');
                        } else {
                            $billing_city = Auth::guard('customer')->user()->city;
                        }

                        if(session()->has('billing_zip')) {
                            $billing_zip = session()->get('billing_zip');
                        } else {
                            $billing_zip = Auth::guard('customer')->user()->zip;
                        }
                        @endphp
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Имя: *</label>
                                <input type="text" class="form-control mb_15" name="billing_name" value="{{ $billing_name }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Адрес эл.почты: *</label>
                                <input type="text" class="form-control mb_15" name="billing_email" value="{{ $billing_email }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Номер телефона: *</label>
                                <input type="text" class="form-control mb_15" name="billing_phone" value="{{ $billing_phone }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Страна: *</label>
                                <input type="text" class="form-control mb_15" name="billing_country" value="{{ $billing_country }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Адрес: *</label>
                                <input type="text" class="form-control mb_15" name="billing_address" value="{{ $billing_address }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Республика: *</label>
                                <input type="text" class="form-control mb_15" name="billing_state" value="{{ $billing_state }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Город: *</label>
                                <input type="text" class="form-control mb_15" name="billing_city" value="{{ $billing_city }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Почтовый индекс: *</label>
                                <input type="text" class="form-control mb_15" name="billing_zip" value="{{ $billing_zip }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bg-website mb_30">Перейти к оплате</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Корзина подробнее</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            @if(session()->has('cart_room_id'))

                                @php
                                    $total_roomprice =0;
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

                                   $total_price = 0;
                                   for($i=0;$i<count($arr_cart_room_id);$i++)
                                   {
                                       $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                    @endphp

                                    <tr>
                                        <td>
                                            {{ $room_data->name }}
                                            <br>
                                            ({{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }})
                                            <br>
                                            Взрослые: {{ $arr_cart_adult[$i] }}, Дети: {{ $arr_cart_children[$i] }}
                                        </td>
                                        <td class="p_price">
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

                            @endif

                            @if(session()->has('cart_book_id'))

                                @php
                                    $total_bookprice =0;
                                       $arr_cart_book_id = array();
                                       $i=0;
                                       foreach(session()->get('cart_book_id') as $value) {
                                           $arr_cart_book_id[$i] = $value;
                                           $i++;
                                       }
                                       $total_price = 0;
                                       for($i=0;$i<count($arr_cart_book_id);$i++)
                                       {
                                           $book_data = DB::table('books')->where('id',$arr_cart_book_id[$i])->first();
                                @endphp

                                <tr>
                                    <td>
                                        {{ $book_data->title }}
                                        <br>

                                        <br>

                                    </td>
                                    <td class="p_price">
                                        @php

                                            echo '₽'.$book_data->price;
                                        @endphp
                                    </td>
                                </tr>
                                @php
                                    $total_bookprice = $total_bookprice+($book_data->price);
                                }
                                @endphp

                            @endif

                            @if(session()->has('cart_excursion_id'))






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
                                                {{ $excursion_data->name }}
                                                <br>
                                                Дата: {{ $arr_cart_date[$i] }}
                                                <br>
                                                Период: {{ $arr_cart_time_excur[$i] }} - {{ sum8_time($arr_cart_time_excur[$i],$excursion_data->durationExcursion)}}
                                                <br>
                                                Взрослые: {{ $arr_cart_adult_excur[$i] }},
                                                <br>
                                                Пенсионеры: {{ $arr_cart_pensioner[$i] }},
                                                <br>
                                                Дети от 5 до 14 лет: {{ $arr_cart_children_excur[$i]}},
                                                <br>
                                                Дети до 5 лет: {{ $arr_cart_kids[$i]}},
                                                <br>
                                            </td>
                                            <td class="p_price">
                                                @php
                                                    foreach ($excursion_data->discounts as $discount){

                                                    $adult =  $excursion_data->price - ($excursion_data->price * $discounts[0]->discount)/100  ;
                                                    $pensioner= $excursion_data->price - ($excursion_data->price * $discounts[2]->discount)/100  ;
                                                    $children = $excursion_data->price - ($excursion_data->price * $discounts[1]->discount)/100  ;
                                                    $kids = $excursion_data->price - ($excursion_data->price * $discounts[3]->discount)/100  ;
                                                      }

                                                 $adult *  $arr_cart_adult_excur[$i]  = $sum_adult = $adult * $arr_cart_adult_excur[$i];
                                                $pensioner * $arr_cart_pensioner[$i]  = $sum_pensioner =$pensioner * $arr_cart_pensioner[$i];
                                                $children *  $arr_cart_children_excur[$i]  = $sum_children = $children *  $arr_cart_children_excur[$i];
                                                $kids *  $arr_cart_kids[$i]  = $sum_kids = $kids *  $arr_cart_kids[$i];

                                                @endphp
                                           ₽{{ $sum_adult + $sum_pensioner + $sum_children + $sum_kids }}
                                            </td>
                                        </tr>

                                        @php
                                            $total_excursionprice = $total_excursionprice + ($sum_adult + $sum_pensioner + $sum_children + $sum_kids);
                                        }
                                        @endphp

                                        </tbody>


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



                            @endif
                                <tr>
                                    <td><b>Всего:</b></td>
                                    <td class="p_price"><b>₽{{ $total_roomprice + $total_bookprice + $total_excursionprice}}</b></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@php
    function sum8_time()
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
