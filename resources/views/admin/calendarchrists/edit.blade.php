@extends('admin.layout.app')

@section('heading', 'Редактировать даты')

@section('right_top_button')
<a href="{{ route('admin.calendarchrist.view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.calendarchrist.update',$calendarchrist_data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Наименование</label>
                                    <input type="text" class="form-control" name="title" value="{{ $calendarchrist_data->title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Цвет</label>
                                    <input type="color" class="form-control" name="color" value="{{ $calendarchrist_data->color }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Начало </label>
                                    <input type="datetime" class="form-control" name="start_date" value="{{ $calendarchrist_data->start_date}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Конец</label>
                                    <input type="datetime" class="form-control" name="end_date" value="{{ $calendarchrist_data->end_date}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
