@extends('front.layout.app')

@section('main_content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">Добавить запись</button>
        </div>
      </div>
      @if($errors->any())
        @foreach($errors->all() as $error)
       
        @endforeach
        @endif
<form method="post" action="#">
    @csrf

    
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title')}}">
    </div> 
    <div class="form-group">
        <label for="text">Содержание</label>
        <input type="text" class="form-control" name="text" id="text" value="{{ old('text')}}">
    </div> 
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" name="author" id="author">
    </div> 

    <div class="form-group">
        <label for="image">Изображение</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>

    <div class="form-group">
        <label for="isPrivate">Приватная ли новость?</label>
        <select class="form-control" name="isPrivate" id="isPrivate" value="{{ old('isPrivate')}}">
            <option @if(old('isPrivate') ==='yes') selected @endif value=1>yes</option>
            <option @if(old('isPrivate') ==='no') selected @endif value=0>no</option>
        <select>
    </div> 
</br>
<button type="submit" class="btn btn-success">Сохранить</button>

</form>


</main>
@endsection
