@extends('admin.layout.app')

@section('heading', 'Посмотреть дни экскурсий')

@section('right_top_button')
<a href="{{ route('admin_whatday_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить новый</a>
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
                                    <th>Имя</th>
                                    <th>Краткое имя</th>
                                    <th>День экскурсии</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($whatdays as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                      {{ $row-> name }}
                                    </td>
                                    <td>
                                        {{ $row-> shortname }}
                                    </td>
                                    <td>
                                        {{ $row-> whatday }}
                                    </td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_whatday_edit',$row->id) }}" class="btn btn-primary">Изменить</a>
                                        <a href="{{ route('admin_whatday_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены ?');">Удалить</a>
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
