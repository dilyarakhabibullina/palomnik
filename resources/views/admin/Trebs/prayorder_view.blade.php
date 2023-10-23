@extends('admin.layout.app')

@section('heading', 'Просмотр заказанных треб')

@section('right_top_button')
<a href="{{ route('admin_prayorder_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить новый</a>
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
                                <th scope="col">Имя</th>
                                <th scope="col">Адрес эл.почты</th>
                                <th scope="col">Лист</th>
                                <th scope="col">Категория треб</th>
                                <th scope="col">Церковь</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=0; @endphp
                            @foreach($prayorders as $row)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$row->name}} </td>
                                    <td>{{$row->email}} </td>
                                    <td>{!! $row->list_name !!} </td>
                                    <td>
                                        <ul>
                                            @foreach ($row->trebs as $treb)
                                                <li class="user-books-genres-list genre-name">{{$treb->name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($row->churches as $church)
                                                <li class="user-books-genres-list genre-name">{{$church->name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td class="pt_10 pb_10">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Подробнее</button>
                                        <a href="{{ route('admin_prayorder_edit',$row->id) }}" class="btn btn-primary">Изменить</a>
                                        <a href="{{ route('admin_prayorder_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены?');">Удалить</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Заказанная треба подробнее</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Название</label></div>
                                                    <div class="col-md-8">{{ $row->name }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Адрес эл.почты</label></div>
                                                    <div class="col-md-8">{{$row->email}} </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Лист</label></div>
                                                    <div class="col-md-8">{!! $row->list_name !!}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Категория треб</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->trebs as $treb)
                                                            <li class="user-books-genres-list genre-name">{{$treb->name}}</li>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Церковь</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->churches as $church)
                                                            <li class="user-books-authors-list">{{$church->name}}</li>
                                                        @endforeach
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
