@extends('admin.layout.app')

@section('heading', 'Редактировать церковь')

@section('right_top_button')
<a href="{{ route('admin_church_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_church_update',$church_data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-4">
                                    <label class="form-label">Имя</label>
                                    <input type="text" class="form-control" name="name" value="{{ $church_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Адрес эл.почты</label>
                                    <input type="text" class="form-control" name="email" value="{{ $church_data->email }}">
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
