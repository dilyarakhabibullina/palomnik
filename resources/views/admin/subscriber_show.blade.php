@extends('admin.layout.app')

@section('heading', 'Все не подтвержденные подписчики')

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
                                @foreach($all_subscribers as $subscriber)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td class="pt_10 pb_10 ">
                                       <form method="post" action="/admin/subscribers/show">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $subscriber->id }}"/>
                                            <button class="btn btn-primary" type="submit">
                                                Подтвердить
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
