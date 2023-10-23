@extends('admin.layout.app')

@section('heading', 'Все подтвержденные подписчики')

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
                                    <th>Номер</th>
                                    <th>Адрес эл.почты</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_subscriberConfirmed as $subscriberConfirmed)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subscriberConfirmed->email }}</td>
                                    <td class="pt_10 pb_10 ">
                                        <form method="post" action="/admin/subscribers/showConfirmed">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $subscriberConfirmed->id }}"/>
                                            <button class="btn btn-primary" type="submit">
                                                В не подтвержденные
                                            </button>
                                        </form>
                                    </td>
                                </tr>
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
