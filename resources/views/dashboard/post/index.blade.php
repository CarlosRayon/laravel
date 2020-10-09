@extends('dashboard.master')

@section('content')

<a href="{{route('post.create')}}" class="btn btn-success my-3">Crear</a>
<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Titulo
            </td>
            <td>
                Posteado
            </td>
            <td>
                Creación
            </td>
            <td>
                Actualización
            </td>
            <td>

            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                {{$post->id}}
            </td>
            <td>
                {{$post->title}}
            </td>
            <td>
                {{$post->posted}}
            </td>
            <td>
                {{$post->created_at->format('d-m-Y')}} {{-- Usa la libreria carbon ya integrada --}}
            </td>
            <td>
                {{$post->updated_at->format('d-m-Y')}}
            </td>
            <td>
                <a href="{{route('post.show', $post->id)}}" class="btn btn-primary">Ver</a>
                <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary">Actualizar</a>


                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                    data-id="{{$post->id}}">Eliminar</button>

            </td>
        </tr>

        @endforeach
    </tbody>
</table>

{{ $posts->links()}}



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open
    modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open
    modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
    data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea borrar el registro seleccionado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                {{-- Implementamos otro form para enviar un DELETE --}}
                <form id="formDelete" method="POST" action="{{route('post.destroy', 0)}}"
                    data-action="{{route('post.destroy', 0)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    window.onload = function(){

        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

            /* Me apoyo en el data para recuperar la url del action siempre limpia */
            var action = $('#formDelete').data('action').slice(0,-1)
            $('#formDelete').attr('action', action + id)

            var modal = $(this)
            modal.find('.modal-title').text('Vas a borrar el POST: ' + id)
        })
    }
</script>
@endsection