@extends('admin.layout.app')

@section('heading', 'Edit Profile')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                                <input type="file" class="form-control mt_10" name="photo">
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Имя *</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Адресс эл.почты *</label>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Пароль</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Повторно введите пароль</label>
                                    <input type="password" class="form-control" name="retype_password">
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
