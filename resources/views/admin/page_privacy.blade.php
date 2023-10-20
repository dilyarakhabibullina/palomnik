@extends('admin.layout.app')

@section('heading', 'Редактировать страницу Политика конфиденциальности')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_privacy_update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Заголовок*</label>
                                    <input type="text" class="form-control" name="privacy_heading" value="{{ $page_data->privacy_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Контент *</label>
                                    <textarea name="privacy_content" class="form-control snote" cols="30" rows="10">{{ $page_data->privacy_content }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Статус *</label>
                                    <select name="privacy_status" class="form-control">
                                        <option value="1" @if($page_data->privacy_status == 1) selected @endif>Показать</option>
                                        <option value="0" @if($page_data->privacy_status == 0) selected @endif>Скрыть</option>
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
