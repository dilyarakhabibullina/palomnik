@extends('customer.layout.app')

@section('heading', 'Счет-фактура заказа')

@section('main_content')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Счет-фактура</h2>
                        <div class="invoice-number">Заказ #{{ $order->order_no }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Счет-фактура на</strong><br>
                                {{ Auth::guard('customer')->user()->name }}<br>
                                {{ Auth::guard('customer')->user()->address }},<br>
                                {{ Auth::guard('customer')->user()->state }}, {{ Auth::guard('customer')->user()->city }}, {{ Auth::guard('customer')->user()->zip }}
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Дата выставления счета</strong><br>
                                {{ $order->booking_date }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Краткое описание заказа</div>
                    <p class="section-lead">Ниже подробно приведена информация :</p>
                    <hr class="invoice-above-table">
                    @php $d=0 @endphp
                    @if($d==1)
                   <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>SL</th>
                                <th>Название комнаты</th>
                                <th class="text-center">Дата заезда</th>
                                <th class="text-center">Дата выезда</th>
                                <th class="text-center">Число взрослых</th>
                                <th class="text-center">Число детей</th>
                                <th class="text-right">Промежуточный итог</th>
                            </tr>
                            @php $total = 0; @endphp
                            @foreach($order_detail as $item)
                            @php
                            $room_data = \App\Models\Room::where('id',$item->room_id)->first();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room_data->name }}</td>
                                <td class="text-center">{{ $item->checkin_date }}</td>
                                <td class="text-center">{{ $item->checkout_date }}</td>
                                <td class="text-center">{{ $item->adult }}</td>
                                <td class="text-center">{{ $item->children }}</td>
                                <td class="text-right">
                                    @php
                                    $d1 = explode('/',$item->checkin_date);
                                    $d2 = explode('/',$item->checkout_date);
                                    $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                    $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                    $t1 = strtotime($d1_new);
                                    $t2 = strtotime($d2_new);
                                    $diff = ($t2-$t1)/60/60/24;
                                    $sub = $room_data->price*$diff;
                                    @endphp
                                    ₽{{ $sub }}
                                </td>
                            </tr>
                            @php
                            $total += $sub;
                            @endphp
                            @endforeach
                        </table>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>SL</th>
                                <th>Название экскурсии</th>
                                <th class="text-center">Дата </th>
                                <th class="text-center">Время</th>
                                <th class="text-center">Число взрослых</th>
                                <th class="text-center">Число пенсионеров</th>
                                <th class="text-center">Число детей 5-14 лет</th>
                                <th class="text-center">Число детей до 5 лет</th>
                                <th class="text-right">Промежуточный итог</th>
                            </tr>
                            @php $total = 0; @endphp
                            @foreach($orderexcur_detail as $item)
                                @php
                                    $excursion_data = \App\Models\Excursion::where('id',$item->excursion_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $excursion_data->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->time }} - {{sum10_time($item->time,$excursion_data->durationExcursion)}}</td>
                                    <td class="text-center">{{ $item->adult }}</td>
                                    <td class="text-center">{{ $item->pensioner}}</td>
                                    <td class="text-center">{{ $item->children }}</td>
                                    <td class="text-center">{{ $item->kids }}</td>
                                    <td class="text-right">
                                        ₽{{$sub= $item->subtotal }}
                                    </td>
                                </tr>
                                @php
                                    $total += $sub;
                                @endphp
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Всего</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">₽{{ $total }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="about-print-button">
        <div class="text-md-right">
            <a href="javascript:window.print();" class="btn btn-warning btn-icon icon-left text-white print-invoice-button"><i class="fa fa-print"></i>Распечятать</a>
        </div>
    </div>
</div>
@endsection
@php
    function sum10_time()
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
