@extends('admin.layout.app')

@section('heading', 'Редактировать страницу правил и условий')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_terms_update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Заголовок *</label>
                                    <input type="text" class="form-control" name="terms_heading" value="{{ $page_data->terms_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Контент *</label>
                                    <textarea name="terms_content" class="form-control snote" cols="30" rows="10">{{ $page_data->terms_content }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Статус *</label>
                                    <select name="terms_status" class="form-control">
                                        <option value="1" @if($page_data->terms_status == 1) selected @endif>Показать</option>
                                        <option value="0" @if($page_data->terms_status == 0) selected @endif>Скрыть</option>
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