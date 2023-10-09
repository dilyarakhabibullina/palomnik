@extends('admin.layout.app')

@section('heading', 'Посмотреть посты')

@section('right_top_button')
<a href="{{ route('admin_post_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить новый</a>
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
                                    <th>Заголовок</th>
                                    <th>Дествие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w_200">
                                    </td>
                                    <td>{{ $row->heading }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_post_edit',$row->id) }}" class="btn btn-primary">Изменить</a>
                                        <a href="{{ route('admin_post_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены?');">Удалить</a>
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
