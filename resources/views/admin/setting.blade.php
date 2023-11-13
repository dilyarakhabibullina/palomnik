@extends('admin.layout.app')

@section('heading', 'Настройки')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_setting_update',$setting_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Существующая иконка</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->logo) }}" alt="" class="w_200">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Иконка на замену</label>
                                            <div>
                                                <input type="file" name="logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Существующий значок</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->favicon) }}" alt="" class="w_50">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Значок на замену</label>
                                            <div>
                                                <input type="file" name="favicon">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Телефон на верхней панели</label>
                                    <input type="text" class="form-control" name="top_bar_phone" value="{{ $setting_data->top_bar_phone }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Адрес эл.почты на верхней панели</label>
                                    <input type="text" class="form-control" name="top_bar_email" value="{{ $setting_data->top_bar_email }}">
                                </div>


                                <div class="mb-4">
                                    <label class="form-label">Статус особенностей</label>
                                    <select name="home_feature_status" class="form-control">
                                        <option value="Show" @if($setting_data->home_feature_status == 'Show') selected @endif>Показать</option>
                                        <option value="Hide" @if($setting_data->home_feature_status == 'Hide') selected @endif>Скрыть</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Какое кол-во комнат показать</label>
                                    <input type="text" class="form-control" name="home_room_total" value="{{ $setting_data->home_room_total }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Статус комнат</label>
                                    <select name="home_room_status" class="form-control">
                                        <option value="Show" @if($setting_data->home_room_status == 'Show') selected @endif>Показать</option>
                                        <option value="Hide" @if($setting_data->home_room_status == 'Hide') selected @endif>Скрыть</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Статус отзывов</label>
                                    <select name="home_testimonial_status" class="form-control">
                                        <option value="Show" @if($setting_data->home_testimonial_status == 'Show') selected @endif>Показать</option>
                                        <option value="Hide" @if($setting_data->home_testimonial_status == 'Hide') selected @endif>Скрыть</option>
                                    </select>
                                </div>



                                <div class="mb-4">
                                    <label class="form-label">Какое кол-во последних сообщений показать</label>
                                    <input type="text" class="form-control" name="home_latest_post_total" value="{{ $setting_data->home_latest_post_total }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Статус всех последних сообщений</label>
                                    <select name="home_latest_post_status" class="form-control">
                                        <option value="Show" @if($setting_data->home_latest_post_status == 'Show') selected @endif>Показать</option>
                                        <option value="Hide" @if($setting_data->home_latest_post_status == 'Hide') selected @endif>Скрыть</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Адрес на футере</label>
                                    <textarea name="footer_address" class="form-control h_100" cols="30" rows="10">{{ $setting_data->footer_address }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Телефон на футуре</label>
                                    <input type="text" class="form-control" name="footer_phone" value="{{ $setting_data->footer_phone }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Адрес эл.почты на футере</label>
                                    <input type="text" class="form-control" name="footer_email" value="{{ $setting_data->footer_email }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Copyright текст</label>
                                    <input type="text" class="form-control" name="copyright" value="{{ $setting_data->copyright }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Цвет темы 1</label>
                                    <input type="color" class="form-control" name="theme_color_1" value="{{ $setting_data->theme_color_1 }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Цвет темы 2</label>
                                    <input type="color" class="form-control" name="theme_color_2" value="{{ $setting_data->theme_color_2 }}">
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
