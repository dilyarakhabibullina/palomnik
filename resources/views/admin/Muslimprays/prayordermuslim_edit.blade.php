@extends('admin.layout.app')

@section('heading', 'Редактировать заказанную молитву')

@section('right_top_button')
<a href="{{ route('admin_prayordermuslim_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_prayordermuslim_update',$prayordermuslim_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Имя *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $prayordermuslim_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Адрес эл.почты *</label>
                                    <input type="text" class="form-control" name="email" value="{{ $prayordermuslim_data->email }}">
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Лист *</label>
                                    <textarea name="list_name" class="form-control snote" cols="30" rows="10">{!! $prayordermuslim_data->list_name !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="trebs">Молитвы</label>
                                    <select class="form-control" id="church" name="muslimpray">
                                        <option>Выберите молитвы</option>
                                        @foreach($all_muslimprays as $muslimpray)
                                            <option value="{{ $muslimpray->id }}" @selected($prayordermuslim_data->muslimprays->contains($muslimpray))>{{ $muslimpray->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="trebs">Мечети</label>
                                    <select class="form-control" id="church" name="mosque">
                                        <option>Выберите мечеть</option>
                                        @foreach($all_mosques as $mosque)
                                            <option value="{{ $mosque->id }}" @selected($prayordermuslim_data->mosques->contains($mosque))>{{ $mosque->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Изменить</button>
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
