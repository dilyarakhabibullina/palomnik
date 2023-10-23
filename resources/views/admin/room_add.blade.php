@extends('admin.layout.app')

@section('heading', 'Добавить номер')

@section('right_top_button')
<a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Все комнаты</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_room_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Фото *</label>
                                    <div>
                                        <input type="file" name="featured_photo">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Имя *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Описание *</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Цена *</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Всего комнат в номере *</label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{ old('total_rooms') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Услуги</label>
                                    @php $i=0; @endphp
                                    @foreach($all_amenities as $item)
                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_amenities[]">
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Размер</label>
                                    <input type="text" class="form-control" name="size" value="{{ old('size') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Кол-во кроватей</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{ old('total_beds') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Кол-во ванных комнат</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{ old('total_bathrooms') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Кол-во балконов</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{ old('total_balconies') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Посетители</label>
                                    <input type="text" class="form-control" name="total_guests" value="{{ old('total_guests') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Видео Id</label>
                                    <input type="text" class="form-control" name="video_id" value="{{ old('video_id') }}">
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
