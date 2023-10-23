@extends('admin.layout.app')

@section('heading', 'Редактировать страницу часто задаваемые вопросы')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_faq_update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Заголовок *</label>
                                    <input type="text" class="form-control" name="faq_heading" value="{{ $page_data->faq_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Статус *</label>
                                    <select name="faq_status" class="form-control">
                                        <option value="1" @if($page_data->faq_status == 1) selected @endif>Показать</option>
                                        <option value="0" @if($page_data->faq_status == 0) selected @endif>Скрыть</option>
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
