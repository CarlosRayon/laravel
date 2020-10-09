<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Módulo admin</title>
    {{-- Dependencias necesarias asset() hace refenrencia a la carpeta public--}}
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <script src="{{asset("js/app.js")}}"></script>
</head>

<body>

    @include('dashboard.partials.nav-header-main')

    <div class="container mt-5">

        @include('dashboard.partials.session-flash-status')

        {{-- Formulario --}}
        @yield('content')
    </div>
</body>

</html>