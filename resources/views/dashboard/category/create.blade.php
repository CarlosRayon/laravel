@extends('dashboard.master')

@section('content')
<h2>CREAR</h1>
<form action="{{ route("category.store") }}" method="POST">
@include('dashboard.category._form')
</form>

@include('dashboard.partials.validation-error')


@endsection