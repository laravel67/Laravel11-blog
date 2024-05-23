<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class="py-10 max-w-screen-md border-b border-gray-400">
        <h2 class="mb-4 text-3xl font-bold tracking-tighter text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="#">{{ $post['author'] }}</a> | {{ $post['publish_at'] }}
        </div>
        <p align="justify" class="font-light my-4">
            {{ Str::limit($post['body'], 100) }}
        </p> <a href="{{ route('blog') }}" class="font-medium text-blue-500 hover:underline">&laquo; Kembali</a>
    </article>
</x-layout>