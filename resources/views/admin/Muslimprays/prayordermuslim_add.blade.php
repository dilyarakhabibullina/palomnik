@extends('admin.layout.app')

@section('heading', 'Добавить заказанную молитву')

@section('right_top_button')
<a href="{{ route('admin_prayordermuslim_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_prayordermuslim_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-4">
                                    <label class="form-label">Имя *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Адрес эл.почты *</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Лист *</label>
                                    <textarea name="list_name" class="form-control snote" cols="30" rows="10">{{ old('list_name') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="prays">Название мусульманской молитвы</label>
                                    <select class="form-control" id="pray" name="muslimpray">
                                        <option>Выберите молитвы</option>
                                        @foreach($all_muslimprays as $pray)
                                            <option value="{{ $pray->id }}">{{ $pray->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style ="margin-bottom:10px "> </div>
                                <div class="form-group">
                                    <label for="mosques">Название мечети</label>
                                    <select class="form-control" id="mosque" name="mosque">
                                        <option>Выберите мечеть</option>
                                        @foreach($all_mosques as $mosque)
                                            <option value="{{ $mosque->id }}">{{ $mosque->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Подтвердить</button>
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
