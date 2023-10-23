@extends('admin.layout.app')

@section('heading', 'Редактировать заказную требу')

@section('right_top_button')
<a href="{{ route('admin_prayorder_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_prayorder_update',$prayorder_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Имя *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $prayorder_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Адрес эл.почты *</label>
                                    <input type="text" class="form-control" name="email" value="{{ $prayorder_data->email }}">
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Лист *</label>
                                    <textarea name="list_name" class="form-control snote" cols="30" rows="10">{!! $prayorder_data->list_name !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="trebs">Церкви</label>
                                    <select class="form-control" id="church" name="church">
                                        <option>Выберите церковь</option>
                                        @foreach($all_churches as $church)
                                            <option value="{{ $church->id }}" @selected($prayorder_data->churches->contains($church))>{{ $church->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="trebs">Категорю треб</label>
                                    <select class="form-control" id="church" name="treb">
                                        <option>Выберите требу</option>
                                        @foreach($all_trebs as $treb)
                                            <option value="{{ $treb->id }}" @selected($prayorder_data->trebs->contains($treb))>{{ $treb->name }}</option>
                                        @endforeach
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
