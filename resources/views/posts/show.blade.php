<x-app-layout>
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
    <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

    <div class="text-lg text-gray-500 mb-2 ">
        {!!$post->extract!!}
    </div>

    <div>
        <h2 class="text-2x1 font-bold text-gray-600 mb-4">Creado por:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFecha:</h2>
        <span class="ml-2 text-gray-600">{{$post->user->name}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$post->created_at}}</span>

        


    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- contenido pricipal --}}
        <div class="lg:col-span-2">
            <figure>
                @if ($post->image)
                <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                @else
                <img class="w-full h-80 object-cover object-center" src="https://static1.educaedu.com.mx/adjuntos/9/00/53/universidad-univer-005399_large.jpg" alt="">
                @endif
                
            </figure>

            <div class="text-base text-gray-500 mt-4"> 
                {!!$post->body!!}
            </div>
        </div>
        {{-- contenido relacionado --}}
        <aside>
            <h1 class="text-2x1 font-bold text-gray-600 mb-4">Mas en {{$post->category->name}}</h1>
            <ul>
                @foreach ($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('posts.show',$similar)}}">
                            @if ($similar->image)
                            <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                            @else
                            <img class="w-36 h-20 object-cover object-center" src="https://static1.educaedu.com.mx/adjuntos/9/00/53/universidad-univer-005399_large.jpg" alt="">
                            @endif
                            
                            

                            <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                @endforeach
            </ul>
        </aside>

        <aside>
            <h1 class="text-2x1 font-bold text-gray-600 mb-4">Usuarios que lo vieron</h1>
            <ul>
                @foreach ($ultimosCuatro as $ultimosCuatro)
                    <li class="mb-4">
                        
                            
                            

                            <span class="ml-2 text-gray-600">{{$ultimosCuatro->name}}</span>
                            
                        </li>
                @endforeach
            </ul>

        </aside>

    </div>

  </div>
</x-app-layout>