@extends('admin.layout.app')

@section('heading', 'Посмотреть периоды экскурсий')

@section('right_top_button')
<a href="{{ route('admin_duration_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить новую</a>
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
                                    <th>Начало экскурсии</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($durations as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                      {{ $row-> start }}
                                    </td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_duration_edit',$row->id) }}" class="btn btn-primary">Изменить</a>
                                        <a href="{{ route('admin_duration_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены ?');">Удалить</a>
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
