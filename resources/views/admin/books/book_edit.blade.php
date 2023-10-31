@extends('admin.layout.app')

@section('heading', 'Редактировать книгу')

@section('right_top_button')
<a href="{{ route('admin_book_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_book_update',$book_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Существующая рекомендуемая фотография</label>
                                    <div>
                                        <img src="{{ asset('uploads/books/'.$book_data->featured_photo) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Изменить избранную фотографию</label>
                                    <div>
                                        <input type="file" name="featured_photo">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Название *</label>
                                    <input type="text" class="form-control" name="title" value="{{ $book_data->title }}">
                                </div>

                                <div class="sm:col-span-1 pt-3">
                                    <label for="authors" class="block text-sm font-medium text-gray-700">Автор</label>
                                    <div class="mt-1">
                                        <select id="authors" name="authors[]" class=" form-multiselect block w-full mt-1"
                                                multiple size="7">
                                            @foreach ($all_authors as $author)
                                                <option value="{{ $author->id }}" @selected($book_data->authors->contains($author))>
                                                    {{ $author->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Описание краткое *</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="10">{{ $book_data->description }}</textarea>
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Описание полное *</label>
                                    <textarea name="fullDescription" class="form-control snote" cols="30" rows="10">{{ $book_data->fullDescription }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Цена *</label>
                                    <input type="text" class="form-control" name="price" value="{{ $book_data->price }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Кол-во страниц *</label>
                                    <input type="text" class="form-control" name="pages" value="{{ $book_data->pages }}">
                                </div>
                                <div class="sm:col-span-1 pt-3">
                                    <label for="publishers" class="block text-sm font-medium text-gray-700">Издательства</label>
                                    <div class="mt-1">
                                        <select id="publishers" name="publishers[]" class="form-multiselect block w-full mt-1"
                                                multiple size="7">
                                            @foreach ($all_publishers as $publisher)
                                                <option value="{{ $publisher->id }}" @selected($book_data->publishers->contains($publisher))>
                                                    {{ $publisher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-1 pt-3">
                                    <label for="genres" class="block text-sm font-medium text-gray-700">Жанры</label>
                                    <div class="mt-1">
                                        <select id="genres" name="genres[]" class="form-multiselect block w-full mt-1"
                                                multiple size="7">
                                            @foreach ($all_genres as $genre)
                                                <option value="{{ $genre->id }}" @selected($book_data->genres->contains($genre))>
                                                    {{ $genre->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-1 pt-3">
                                    <label for="langs" class="block text-sm font-medium text-gray-700">Языки</label>
                                    <div class="mt-1">
                                        <select id="langs" name="langs[]" class="form-multiselect block w-full mt-1"
                                                multiple size="7">
                                            @foreach ($all_langs as $lang)
                                                <option value="{{ $lang->id }}" @selected($book_data->langs->contains($lang))>
                                                    {{ $lang->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-1 pt-3">
                                    <label for="religions" class="block text-sm font-medium text-gray-700">Религии</label>
                                    <div class="mt-1">
                                        <select id="religions" name="religions[]" class="form-multiselect block w-full mt-1"
                                                multiple size="7">
                                            @foreach ($all_religions as $religion)
                                                <option value="{{ $religion->id }}" @selected($book_data->religions->contains($religion))>
                                                    {{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Год выпуска</label>
                                    <input type="text" class="form-control" name="published" value="{{ $book_data->published }}">
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
