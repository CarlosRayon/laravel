@extends('dashboard.master')

@section('content')
<h2>EDITAR</h2>
<form action="{{ route("category.update", $category->id) }}" method="POST">
    {{-- Simular metodos --}}
    @method('PUT')
    @include('dashboard.category._form')
</form>

@include('dashboard.partials.validation-error')


@endsection