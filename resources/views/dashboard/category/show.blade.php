@extends('dashboard.master')




@section('content')

    <div class="form-group">
        <label for="title">Titulo</label>
    <input class="form-control" type="text" name="title" id="title" value="{{$category->title}}" readonly>
    </div>
    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input class="form-control" type="text" name="url_clean" id="url_clean" value="{{$category->url_clean}}" readonly>
    </div>

@endsection