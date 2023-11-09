@extends('admin.layout.app')

@section('heading', 'Посмотреть даты')

@section('right_top_button')
<a href="{{ route('admin.calendarmuslim.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить новую</a>
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
                                    <th>Наименование</th>
                                    <th>Цвет</th>
                                    <th>Начало </th>
                                    <th>Конец </th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calendarmuslims as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $row-> title }}
                                    </td>
                                    <td>
                                        {{ $row-> color }}
                                    </td>
                                    <td>
                                      {{ $row-> start_date }}
                                    </td>
                                    <td>
                                        {{ $row-> end_date }}
                                    </td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin.calendarmuslim.edit',$row->id) }}" class="btn btn-primary">Изменить</a>
                                        <a href="{{ route('admin.calendarmuslim.delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены ?');">Удалить</a>
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
