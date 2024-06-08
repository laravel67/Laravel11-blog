<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @forelse ($posts as $post)
        <article class="py-10 max-w-screen-md border-b border-gray-400">
            <h2 class="mb-4 text-3xl font-bold tracking-tighter text-gray-900">{{ $post->title }}</h2>
            <div class="text-base text-gray-500">
                <strong class="text-green-600">By</strong>
                <a class="hover:underline" href="{{ route('author', $post->author->id) }}">{{ $post->author->name }}</a> <strong class="text-green-600">in</strong> <a class="hover:underline" href="{{ route('category', $post->category->id) }}">{{ $post->category->name }}</a> | {{ $post->created_at->diffForHumans() }}
            </div>
            <p align="justify" class="font-light my-4">
                {{ Str::limit($post->body, 100) }}
            </p> <a href="{{ route('post', $post->slug) }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
        </article>
    @empty
        
    @endforelse
</x-layout>