@extends('front.layout.app')

@section('main_content')

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->payment_heading }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 checkout-left mb_30">

                @if(session()->has('cart_room_id'))
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
                $total_price = 0;
                for($i=0;$i<count($arr_cart_room_id);$i++)
                {
                    $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                    $d1 = explode('/',$arr_cart_checkin_date[$i]);
                    $d2 = explode('/',$arr_cart_checkout_date[$i]);
                    $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                    $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                    $t1 = strtotime($d1_new);
                    $t2 = strtotime($d2_new);
                    $diff = ($t2-$t1)/60/60/24;
                    $total_price = $total_price+($room_data->price*$diff);
                }
                @endphp
                @endif

                @if(session()->has('cart_book_id'))
                    @php
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

                                $total_price = $total_price+($book_data->price);
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

                            $total_price = 0;
                            for($i=0;$i<count($arr_cart_excursion_id);$i++)
                            {
                                $discounts = App\Models\Discount::get();
                                $excursion_data = App\Models\Excursion::with('discounts')->where('id',$arr_cart_excursion_id[$i])->first();

                        @endphp
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

                        @php
                            $total_price = $total_price + ($sum_adult + $sum_pensioner + $sum_children + $sum_kids);
                        }
                        @endphp




                    @endif

                <h4>Произвести оплату</h4>
                <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                    <option value="">Выберите способ оплаты</option>

                    <option value="Stripe">Страйп (Stripe) </option>
                </select>



                <div class="stripe mt_20">
                    <h4>Оплатите с помощью Страйп</h4>
                    @php
                    $cents = $total_price*100;
                    $customer_email = Auth::guard('customer')->user()->email;
                    $customer_name = Auth::guard('customer')->user()->name;
                    $stripe_publishable_key = 'pk_test_51LT28GF67T3XLjgLXbAMW8YNgvDyv6Yrg7mB6yHJhfmWgLrAL79rSBPvxcbKrsKtCesqJmxlOd259nMrNx4Qlhoa00zX7rOhOq';
                    @endphp
                    <form action="{{ route('stripe',$total_price) }}" method="post">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ $stripe_publishable_key }}"
                            data-amount="{{ $cents / 93 }}"
                            data-name= "Покупатель:{{ $customer_name }}"
                            data-description="Курс 93 рублей - 1 доллар США."
                            data-image="{{ asset('uploads/stripe.png') }}"
                            data-currency="usd"
                            data-email="{{ $customer_email }}"
                            data-panelLabel="Оплатить "
                        >
                        </script>
                    </form>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Платежные реквизиты</h4>
                    <div>
                        Имя: {{ session()->get('billing_name') }}
                    </div>
                    <div>
                        Адрес эл.почты: {{ session()->get('billing_email') }}
                    </div>
                    <div>
                        Телефон: {{ session()->get('billing_phone') }}
                    </div>
                    <div>
                        Страна: {{ session()->get('billing_country') }}
                    </div>
                    <div>
                        Адрес: {{ session()->get('billing_address') }}
                    </div>
                    <div>
                        Республика: {{ session()->get('billing_state') }}
                    </div>
                    <div>
                        Город: {{ session()->get('billing_city') }}
                    </div>
                    <div>
                        Почтовый индекс: {{ session()->get('billing_zip') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 checkout-right">
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

@php
$client = 'ARw2VtkTvo3aT7DILgPWeSUPjMK_AS5RlMKkUmB78O8rFCJcfX6jFSmTDpgdV3bOFLG2WE-s11AcCGTD';
@endphp
<script>
	paypal.Button.render({
		env: 'sandbox',
		client: {
			sandbox: '{{ $client }}',
			production: '{{ $client }}'
		},
		locale: 'en_US',
		style: {
			size: 'medium',
			color: 'blue',
			shape: 'rect',
		},
		// Set up a payment
		payment: function (data, actions) {
			return actions.payment.create({
				redirect_urls:{
					return_url: '{{ url("payment/paypal/$total_price") }}'
				},
				transactions: [{
					amount: {
						total: '{{ $total_price }}',
						currency: 'USD'
					}
				}]
			});
		},
		// Execute the payment
		onAuthorize: function (data, actions) {
			return actions.redirect();
		}
	}, '#paypal-button');
</script>

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
@endsection
