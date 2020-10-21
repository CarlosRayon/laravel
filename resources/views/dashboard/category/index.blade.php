@extends('dashboard.master')

@section('content')

<a href="{{route('category.create')}}" class="btn btn-success my-3">Crear</a>
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
        @foreach ($categories as $category)
        <tr>
            <td>
                {{$category->id}}
            </td>
            <td>
                {{$category->title}}
            </td>

            <td>
                {{$category->created_at->format('d-m-Y')}} {{-- Usa la libreria carbon ya integrada --}}
            </td>
            <td>
                {{$category->updated_at->format('d-m-Y')}}
            </td>
            <td>
                <a href="{{route('category.show', $category->id)}}" class="btn btn-primary">Ver</a>
                <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">Actualizar</a>


                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                    data-id="{{$category->id}}">Eliminar</button>

            </td>
        </tr>

        @endforeach
    </tbody>
</table>

{{ $categories->links()}}


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
                <form id="formDelete" method="POST" action="{{route('category.destroy', 0)}}"
                    data-action="{{route('category.destroy', 0)}}">
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
            console.log('ruta base', action);
            $('#formDelete').attr('action', action + id)

            var modal = $(this)
            modal.find('.modal-title').text('Vas a borrar la CATEGORIA: ' + id)
        })
    }
</script>
@endsection