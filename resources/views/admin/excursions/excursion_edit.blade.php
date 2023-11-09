@extends('admin.layout.app')

@section('heading', 'Редактировать экскурсию')

@section('right_top_button')
<a href="{{ route('admin_excursion_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i>Посмотреть все</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_excursion_update',$excursion_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Существующая рекомендуемая фотография</label>
                                    <div>
                                        <img src="{{ asset('uploads/excursions/'.$excursion_data->featured_photo) }}" alt="" class="w_200">
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
                                    <input type="text" class="form-control" name="name" value="{{ $excursion_data->name }}">
                                </div>

                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Описание краткое *</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="10">{{ $excursion_data->description }}</textarea>
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Описание части *</label>
                                    <textarea name="descriptionZone" class="form-control snote" cols="30" rows="10">{{ $excursion_data->descriptionZone }}</textarea>
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Описание полное *</label>
                                    <textarea name="fullDescription" class="form-control snote" cols="30" rows="10">{{ $excursion_data->fullDescription }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Цена *</label>
                                    <input type="text" class="form-control" name="price" value="{{ $excursion_data->price }}">
                                </div>
                                <div class="sm:col-span-1 pt-3">
                                    <label for="placevisits" class="block text-sm font-medium text-gray-700">Места посещения</label>
                                    <div class="mt-1">
                                        <select id="placevisits" name="placevisits[]" class="form-multiselect block w-full mt-1"
                                                multiple size="7">
                                            @foreach ($all_placevisits as $placevisit)
                                                <option value="{{ $placevisit->id }}" @selected($excursion_data->placevisits->contains($placevisit))>
                                                    {{ $placevisit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Место встечи *</label>
                                    <input type="text" class="form-control" name="placeMeeting" value="{{ $excursion_data->placeMeeting }}">
                                </div>

                                <div class="sm:col-span-1 pt-3">
                                    <label for="discounts" class="block text-sm font-medium text-gray-700">Дискаунт</label>
                                    <div class="mt-1">
                                        <select id="discounts" name="discounts[]" class="form-multiselect block w-full mt-1"
                                                multiple size="7">
                                            @foreach ($all_discounts as $discount)
                                                <option value="{{ $discount->id }}" @selected($excursion_data->discounts->contains($discount))>
                                                    {{ $discount->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-1 pt-3">
                                    <label for="discounts" class="block text-sm font-medium text-gray-700">Период</label>
                                    <div class="mt-1">
                                        <select id="durations" name="durations[]" class="form-multiselect block w-full mt-1"
                                                multiple size="25">
                                            @foreach ($all_durations as $duration)
                                                <option value="{{ $duration->id }}" @selected($excursion_data->durations->contains($duration))>
                                                    {{sum_time($duration->start,'00:00')}} - {{ sum_time($duration->start,$excursion_data->durationExcursion)  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Начальный день экскурсии</label>
                                    <input type="datetime" class="form-control" name="startDateExcursion" value="{{ $excursion_data->startDateExcursion }}">
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Конечный день экскурсии</label>
                                    <input type="datetime" class="form-control" name="finishDateExcursion" value="{{ $excursion_data->finishDateExcursion }}">
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Длительность экскурсии</label>
                                    <input type="text" class="form-control" name="durationExcursion" value="{{ $excursion_data->durationExcursion }}">
                                </div>
                                <div class="sm:col-span-1 pt-3">
                                    <label for="whatdays" class="block text-sm font-medium text-gray-700">По каким дням недели</label>
                                    <div class="mt-1">
                                        <select id="discounts" name="whatdays[]" class="form-multiselect block w-full mt-1"
                                                multiple size="8">
                                            @foreach ($all_whatdays as $whatday)
                                                <option value="{{ $whatday->id }}" @selected($excursion_data->whatdays->contains($whatday))>
                                                    {{ $whatday->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Гид</label>
                                    <input type="text" class="form-control" name="guide" value="{{ $excursion_data->guide }}">
                                </div>
                                <div class="sm:col-span-1 pt-3 mb-4">
                                    <label class="form-label">Транспорт</label>
                                    <input type="text" class="form-control" name="transport" value="{{ $excursion_data->transport }}">
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
@php
    function sum_time()
{
$i = 0;
foreach (func_get_args() as $time) {
sscanf($time, '%d:%d', $hour, $min);
$i += $hour * 60 + $min;
}
if ($h = floor($i / 60)) {
$i %= 60;
}
return sprintf('%02d:%02d', $h, $i);
}
@endphp
@endsection

