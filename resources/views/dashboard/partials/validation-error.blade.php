  {{-- Todos los errores --}}
  {{-- {{ var_dump($errors->any() )}} --}}
  @if ($errors->any())
  <div class="alert alert-danger my-2">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif