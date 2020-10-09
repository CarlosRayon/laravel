@extends('dashboard.master')

@section('content')
<h2>CREAR</h1>
<form action="{{ route("post.store") }}" method="POST">
@include('dashboard.post._form')
</form>

@include('dashboard.partials.validation-error')


@endsection