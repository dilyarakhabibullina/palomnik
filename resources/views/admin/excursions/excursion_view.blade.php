@extends('admin.layout.app')

@section('heading', 'Просмотр экскурсий')

@section('right_top_button')
<a href="{{ route('admin_excursion_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить экскурсию</a>
@endsection


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
                                <th scope="col">Номер</th>
                                <th scope="col">Фото</th>
                                <th scope="col">Название</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Место встречи</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=0; @endphp
                            @foreach($excursions as $row)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/excursions/'.$row->featured_photo) }}" alt="User book" class="w_100">
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{!! $row->description !!}</td>
                                    <td>{{$row->placeMeeting}}</td>
                                    <td>{{ $row->price }} руб.</td>

                                    <td class="pt_10 pb_10">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Подробнее</button>
                                        <a href="{{ route('admin_excursion_edit',$row->id) }}" class="btn btn-primary">Изменить</a>
                                        <a href="{{ route('admin_excursion_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены?');">Удалить</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Экскурсия подробнее</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Фото</label></div>
                                                    <div class="col-md-8">
                                                        <img src="{{ asset('uploads/excursions/'.$row->featured_photo) }}" alt="" class="w_200">
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Название</label></div>
                                                    <div class="col-md-8">{{ $row->name }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Описание</label></div>
                                                    <div class="col-md-8">{!! $row->description !!}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Описание части</label></div>
                                                    <div class="col-md-8">{!! $row->descriptionZone !!}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Описание полное</label></div>
                                                    <div class="col-md-8">{!! $row->fullDescription !!}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Место встречи</label></div>
                                                    <div class="col-md-8">{{ $row->placeMeeting }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Стоимость</label></div>
                                                    <div class="col-md-8">{{ $row->price }} руб.</div>
                                                </div>

                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Скидка</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->discounts as $discount)
                                                            <li class="user-books-authors-list">{{$discount->name}} : {{$discount->discount}} % </li>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Период</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->durations as $duration)
                                                            <li class="user-books-authors-list">{{sum_time($duration->start,'00:00')}} - {{ sum_time($duration->start,$row->durationExcursion)  }} </li>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Продолжительность</label></div>
                                                    <div class="col-md-8">{{ $row->durationExcursion }} час.</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">По каким дням</label></div>
                                                    <div class="col-md-8">{{ $row->on_what_days }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Гид</label></div>
                                                    <div class="col-md-8">{{ $row->guide }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Транспорт</label></div>
                                                    <div class="col-md-8">{{ $row->transport }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    function sum_time()
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
