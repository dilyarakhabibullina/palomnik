@extends('admin.layout.app')

@section('heading', 'Просмотр книг')

@section('right_top_button')
<a href="{{ route('admin_book_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Добавить книгу</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th scope="col">Номер</th>
                                <th scope="col">Фото</th>
                                <th scope="col">Название</th>
                                <th scope="col">Авторы</th>
                                <th scope="col">Язык</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Страницы</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=0; @endphp
                            @foreach($books as $row)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/books/'.$row->featured_photo) }}" alt="User book" class="w_100">
                                    </td>
                                    <td>{{ $row->title }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($row->authors as $author)
                                                <li class="user-books-authors-list">{{$author->fullname}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($row->langs as $lang)
                                                <li class="user-books-genres-list genre-name">{{$lang->name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$row->price}} руб;</td>
                                    <td>{{$row->pages}} стр;</td>

                                    <td class="pt_10 pb_10">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Подробнее</button>
                                        <a href="{{ route('admin_book_edit',$row->id) }}" class="btn btn-primary">Изменить</a>
                                        <a href="{{ route('admin_book_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Вы уверены?');">Удалить</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Книга подробнее</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Фото</label></div>
                                                    <div class="col-md-8">
                                                        <img src="{{ asset('uploads/books/'.$row->featured_photo) }}" alt="" class="w_200">
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Название</label></div>
                                                    <div class="col-md-8">{{ $row->title }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Описание</label></div>
                                                    <div class="col-md-8">{!! $row->description !!}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Цена</label></div>
                                                    <div class="col-md-8">₽{{ $row->price }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Всего страниц</label></div>
                                                    <div class="col-md-8">{{ $row->pages }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Язык</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->langs as $lang)
                                                            <li class="user-books-genres-list genre-name">{{$lang->name}}</li>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Автор</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->authors as $author)
                                                            <li class="user-books-authors-list">{{$author->fullname}}</li>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Жанр</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->genres as $genre)
                                                            <li class="user-books-authors-list">{{$genre->name}}</li>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Издательство</label></div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->publishers as $publisher)
                                                            <li class="user-books-authors-list">{{$genre->name}}</li>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Год выпуска</label></div>
                                                    <div class="col-md-8">{{ $row->published }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
