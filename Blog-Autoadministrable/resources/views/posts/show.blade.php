<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">
            {{ $post->name }}
        </h1>
        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="md:col-span-2">
                {{-- añadir autor y cuando se creo --}}
                <div class="text-gray-400 text-sm mb-4">
                    <p>
                        <span class="font-bold">Autor:</span>
                        <span class="text-blue-600">{{ $post->user->name }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Fecha:</span>
                    {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
                <figure>
                        <img class="w-full h-80 object-cover object-center" src="{{ $post->getGetImageAttribute() }}" alt="">
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>
            {{-- Contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                    <img class="w-50 h-20 object-cover object-center" src="{{
                                    $similar->getGetImageAttribute()
                                    }}" alt="">
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>