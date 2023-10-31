@extends('admin.layout.app')

@section('heading', 'Добавить книгу')

@section('right_top_button')
<a href="{{ route('admin_book_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_book_store') }}" method="post" enctype="multipart/form-data">
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
                                    <label class="form-label">Название *</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Описание краткое*</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Описание полное*</label>
                                    <textarea name="fullDescription" class="form-control snote" cols="30" rows="10">{{ old('fullDescription') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Автор</label>
                                    @php $i=0; @endphp
                                    @foreach($all_authors as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_authors[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->fullname }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Цена *</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Кол-во страниц *</label>
                                    <input type="text" class="form-control" name="pages" value="{{ old('pages') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Издательство</label>
                                    @php $i=0; @endphp
                                    @foreach($all_publishers as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_publishers[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Жанры</label>
                                    @php $i=0; @endphp
                                    @foreach($all_genres as $item)
                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_genres[]">
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Язык</label>
                                    @php $i=0; @endphp
                                    @foreach($all_langs as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_langs[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Религия</label>
                                    @php $i=0; @endphp
                                    @foreach($all_religions as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_religions[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Год издания</label>
                                    <input type="text" class="form-control" name="published" value="{{ old('published') }}">
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
