@extends('admin.layout.app')

@section('heading', 'Добавить экскурсию')

@section('right_top_button')
<a href="{{ route('admin_excursion_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_excursion_store') }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Описание краткое*</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Описание части*</label>
                                    <textarea name="descriptionZone" class="form-control snote" cols="30" rows="10">{{ old('descriptionZone') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Описание полное*</label>
                                    <textarea name="fullDescription" class="form-control snote" cols="30" rows="10">{{ old('fullDescription') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Скидка</label>
                                    @php $i=0; @endphp
                                    @foreach($all_discounts as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_discounts[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Начало</label>
                                    @php $i=0; @endphp
                                    @foreach($all_durations as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_durations[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->start }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Цена *</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Места посещения</label>
                                    @php $i=0; @endphp
                                    @foreach($all_placevisits as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_placevisits[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Место встречи *</label>
                                    <input type="text" class="form-control" name="placeMeeting" value="{{ old('placeMeeting') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Начальный день экскурсий</label>
                                    <input type="date" class="form-control" name="startDateExcursion" value="{{ old('startDateExcursion') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Конечный день экскурсий</label>
                                    <input type="date" class="form-control" name="finishDateExcursion" value="{{ old('finishDateExcursion') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Продолжительность</label>
                                    <input type="time" class="form-control" name="durationExcursion" value="{{ old('durationExcursion') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">По каким дням недели</label>
                                    @php $i=0; @endphp
                                    @foreach($all_whatdays as $item)
                                        @php $i++; @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_whatdays[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Гид</label>
                                    <input type="text" class="form-control" name="guide" value="{{ old('guide') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Транспорт</label>
                                    <input type="text" class="form-control" name="transport" value="{{ old('transport') }}">
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
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        config = {
            enableTime: true,
           dateFormat: 'Y-m-d H:i',
        }
        flatpickr("input[type=datetime-local]", config);
    </script>
@endpush
@endsection
