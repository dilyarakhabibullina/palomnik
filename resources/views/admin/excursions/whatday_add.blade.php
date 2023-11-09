@extends('admin.layout.app')

@section('heading', 'Добавить день экскурсии')

@section('right_top_button')
<a href="{{ route('admin_whatday_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_whatday_store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Имя *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Краткое имя *</label>
                                    <input type="text" class="form-control" name="shortname" value="{{ old('shortname') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">День экскурсии *</label>
                                    <input type="text" class="form-control" name="whatday" value="{{ old('whatday') }}">
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
