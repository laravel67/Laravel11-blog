<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" class="text-xl font-bold text-gray-900 dark:text-white hover:text-underline my-5" >{{ $post->author->name }}
                                </a>


                                <p class="bg-{{ $post->category->color }}-200 text-primary-800 text-sm font-medium items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 my-4">
                                    <a href="/posts?category={{ $post->category->slug }}" class="">{{ $post->category->name }}</a>
                                </p>

                                
                                <p class=" text-gray-500 dark:text-gray-400 text-sm my-3">
                                    <time pubdate datetime="{{ $post->created_at }}"
                                        title="February 8th, 2022">{{ $post->created_at->diffForHumans() }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}
                        
                    </h1>
                </header>
                <figure>
                    <img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png" alt="">
                </figure>
                <p>
                    {!! $post->body !!}
                </p>
               </p> <a href="{{ route('posts') }}" class="font-medium text-blue-500 hover:underline">&laquo; Kembali</a>
            </article>
        </div>
    </main>
</x-layout>