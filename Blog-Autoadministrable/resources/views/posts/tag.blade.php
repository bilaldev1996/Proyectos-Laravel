<x-app-layout>
    <div class="container py-5">
        <h1 class="text-4xl font-bold text-center uppercase text-gray-500">
            Etiqueta: {{ $tag->name }}
        </h1>
        @foreach ($posts as $post)
            <x-card-posts :post="$post" />
        @endforeach
        <div class="mt-4 mb-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>