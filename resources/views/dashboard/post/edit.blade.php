@extends('dashboard.master')

@section('content')
<h2>EDITAR</h2>
<form action="{{ route("post.update", $post->id) }}" method="POST">
    {{-- Simular metodos --}}
    @method('PUT')
    @include('dashboard.post._form')
</form>

@include('dashboard.partials.validation-error')

<form action="{{ route("post.image", $post) }}" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf

    <div class="row">
        <div class="col">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col">
            <input type="submit" value="Subir" class="btn btn-primary">
        </div>
    </div>
</form>


@endsection