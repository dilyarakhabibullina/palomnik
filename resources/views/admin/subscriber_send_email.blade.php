@extends('admin.layout.app')

@section('heading', 'Послать эл.письмо подписчикам')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_subscriber_send_email_submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Тема</label>
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Послание</label>
                                    <textarea name="message" class="form-control h_100" cols="30" rows="10">{{ old('message') }}</textarea>
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
