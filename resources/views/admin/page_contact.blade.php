@extends('admin.layout.app')

@section('heading', 'Редактировать страницу контакты')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_contact_update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Заголовок *</label>
                                    <input type="text" class="form-control" name="contact_heading" value="{{ $page_data->contact_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Код карты</label>
                                    <textarea name="contact_map" class="form-control h_100" cols="30" rows="10">{{ $page_data->contact_map }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status *</label>
                                    <select name="contact_status" class="form-control">
                                        <option value="1" @if($page_data->contact_status == 1) selected @endif>Показать</option>
                                        <option value="0" @if($page_data->contact_status == 0) selected @endif>Скрыть</option>
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
