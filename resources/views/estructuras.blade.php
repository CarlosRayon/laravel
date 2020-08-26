<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estructuras control y ciclos</title>
</head>
<body>

   <a href="{{route('home')}}">HOME</a>

    <h1>Estructuras de control y ciclos</h1>

     {{-- Foreach --}}
     <h2>Foreach</h2>
     <ul>
         @foreach ($posts as $post)
         <li>{{ $post }}</li>
         @endforeach
     </ul>

     {{-- Forelse --}}
     <h2>Foreach else</h2>
     <ul>
         @forelse ($posts2 as $post)
         <li>{{ $post }}</li>
         @empty
         <li>VACIO</li>
         @endforelse
     </ul>

     {{-- if --}}
     <h2>IF</h2>
     <ul>
         @forelse ($posts as $post)
         {{-- <?php dd($loop) ?> --}}
         <li>
             @if ($loop->first)
             Primero:
             @elseif ($loop->last)
             Ultimo:
             @else
             Medio
             @endif
             {{ $post }}
         </li>
         @empty
         <li>VACIO</li>
         @endforelse
     </ul>
     {{-- isset --}}
     <h2>Isset</h2>
     @isset($posts2)
     Variable sin definir
     @endisset
     {{-- empty --}}
     <h2>Empty</h2>
     @empty($posts2)
     Variable vacia
     @endempty


</body>
</html>