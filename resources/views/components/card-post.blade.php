@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
    <img class="w-full h-72 object-center object-cover" src="{{Storage::url($post->image->url)}}" alt="">
    @else
    <img class="w-full h-72 object-center object-cover" src="https://static1.educaedu.com.mx/adjuntos/9/00/53/universidad-univer-005399_large.jpg" alt="">
    @endif
    
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('posts.tag',$tag)}}" class="text-sm text-gray-700 mr-2 inline-block bg-{{$tag->color}}-200 rounded-full px-3 py-3">{{$tag->name}}</a>
        @endforeach

    </div>
</article>