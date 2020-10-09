@extends('dashboard.master')

@section('content')
<h2>EDITAR</h2>
<form action="{{ route("post.update", $post->id) }}" method="POST">
    {{-- Simular metodos --}}
    @method('PUT')
    @include('dashboard.post._form')
</form>

@include('dashboard.partials.validation-error')


@endsection