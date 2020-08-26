<link rel="stylesheet" href="{{asset("css/app.css")}}">
<script src="{{asset("js/app.js")}}"></script>


<div class="container">
    <form action="{{ route("post.store") }}" method="POST">
        {{--  token de autentificacion del formulario --}}
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input class="form-control" type="text" name="url_clean" id="url_clean">
        </div>
        <div class="form-group">
            <label for="content">Url limpia</label>
            <textarea class="form-control" type="textar" name="content" id="content"> </textarea>
        </div>
        <input type="submit" value="Enviar">
    </form>
</div>

