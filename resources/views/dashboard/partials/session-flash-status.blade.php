{{-- El status viene de back()->with('status','Post creado con exito'); --}}
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif