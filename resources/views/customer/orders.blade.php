@extends('customer.layout.app')

@section('heading', 'Мои заказы')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Заказ №</th>
                                    <th>Метод оплаты</th>
                                    <th>Дата бронирования</th>
                                    <th>Оплаченная сумма</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->order_no }}</td>
                                    <td>{{ $row->payment_method }}</td>
                                    <td>{{ $row->booking_date }}</td>
                                    <td>{{ $row->paid_amount }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('customer_invoice',$row->id) }}" class="btn btn-primary">Подробнее</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
