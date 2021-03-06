{{--  token de autentificacion del formulario --}}
@csrf
<div class="form-group">
    <label for="title">Titulo</label>
    <input class="form-control" type="text" name="title" id="title" value="{{old('title', $post->title)}}">
    {{-- error individual --}}
    @error('title')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input class="form-control" type="text" name="url_clean" id="url_clean"
        value="{{old('url_clean', $post->url_clean)}}">
</div>
<div class="form-group">
    <label for="category_id">Categorías</label>
    <select class="form-control" name="category_id" id="category_id">
        {{--
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach --}}

        {{-- Puedo hacer esto pasando dos valores del array de datos --}}
        @foreach ($categories as $title => $id)
        <option {{$post->category_id == $id ? 'selected="selected"' : '' }}  value="{{$id}}"> {{$title}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="posted">Posted</label>
    <select class="form-control" name="posted" id="posted">
        @include('dashboard.partials.option-yes-not',['val' => $post->posted])
    </select>
</div>
<div class="form-group">
    <label for="content">Contenido</label>
    <textarea class="form-control" type="textar" name="content"
        id="content">{{old('content',$post->content)}} </textarea>
    {{-- error individual --}}
    @error('content')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<input type="submit" class="btn btn-primary" value="Enviar">