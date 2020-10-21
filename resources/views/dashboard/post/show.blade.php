@extends('dashboard.master')


@section('content')

    <div class="form-group">
        <label for="title">Titulo</label>
    <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}" readonly>
        {{-- error individual --}}
        @error('title')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input class="form-control" type="text" name="url_clean" id="url_clean" value="{{$post->url_clean}}" readonly>
          {{-- error individual --}}
        @error('content')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea class="form-control" type="textar" name="content" id="content" readonly>{{$post->content}} </textarea>
        {{-- error individual --}}
        @error('content')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

@endsection