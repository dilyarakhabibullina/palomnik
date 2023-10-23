@extends('admin.layout.app')

@section('heading', 'Все комнаты')

@section('right_top_button')
<a href="{{ route('admin_room_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить комнату</a>
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
                                    <th>Номер</th>
                                    <th>Фото</th>
                                    <th>Имя</th>
                                    <th>Цена (за ночь)</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($rooms as $row)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$row->featured_photo) }}" alt="" class="w_200">
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>₽{{ $row->price }}</td>
                                    <td class="pt_10 pb_10">

                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Подробнее</button>

                                        <a href="{{ route('admin_room_gallery',$row->id) }}" class="btn btn-success">Галерея</a>

                                        <a href="{{ route('admin_room_edit',$row->id) }}" class="btn btn-primary">Редактировать</a>
                                        <a href="{{ route('admin_room_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены?');">Удалить</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Номер подробнее</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Фото</label></div>
                                                    <div class="col-md-8">
                                                        <img src="{{ asset('uploads/'.$row->featured_photo) }}" alt="" class="w_200">
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Имя</label></div>
                                                    <div class="col-md-8">{{ $row->name }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Описание</label></div>
                                                    <div class="col-md-8">{!! $row->description !!}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Цена (за ночь)</label></div>
                                                    <div class="col-md-8">₽{{ $row->price }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Всего комнат</label></div>
                                                    <div class="col-md-8">{{ $row->total_rooms }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Всего услуг</label></div>
                                                    <div class="col-md-8">
                                                        @php
                                                        $arr = explode(',',$row->amenities);
                                                        for($j=0;$j<count($arr);$j++) {
                                                            $temp_row = \App\Models\Amenity::where('id',$arr[$j])->first();
                                                            echo $temp_row->name.'<br>';
                                                        }
                                                        @endphp
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Размер</label></div>
                                                    <div class="col-md-8">{{ $row->size }}м²</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Всего кроватей</label></div>
                                                    <div class="col-md-8">{{ $row->total_beds }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Всего ванных комнат</label></div>
                                                    <div class="col-md-8">{{ $row->total_bathrooms }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Всего балконов</label></div>
                                                    <div class="col-md-8">{{ $row->total_balconies }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Всего гостей</label></div>
                                                    <div class="col-md-8">{{ $row->total_guests }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Видео</label></div>
                                                    <div class="col-md-8">
                                                        <div class="iframe-container1">
                                                            <iframe width="280" height="155" src="https://www.youtube.com/embed/{{ $row->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        </div>
                                                    </div>
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
@endsection
