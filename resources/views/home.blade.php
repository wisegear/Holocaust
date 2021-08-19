<x-layout>

    <!-- Uses the PagesController -->
    <!-- Header and random quote passed from Quotes::class -->
    <div>
        <h1 class="text-center text-lg font-bold pb-2">Holocaust History Site </h1>
        <div class="text-center text-sm my-5 text-gray-600">
            <p>{{ $quote->quote }}</p>
            <p class="font-semibold text-red-500">-- {{ $quote->author }}</p>
        </div>
        <div class="flex justify-center py-2 gap-4">
            <a href="/important"><button class="border rounded-md text-red-500 uppercase py-1 px-2 text-xs hover:text-red-800">Important</button></a>
            <a href="/about"><button class="border rounded-md text-red-500 uppercase py-1 px-2 text-xs hover:text-red-800">About</button></a>
        </div>
    </div>

    <!-- Display most recent blog posts -->
    <div class="border-b my-5 text-sm font-bold text-red-500">
        <p>Recent Blog Posts</p>
    </div>

    <div class="flex justify-between gap-10">
        <!-- get 3 most recent posts BlogPosts::class -->
        @foreach($posts as $post)
        <div class="w-full">
            <img src="/images/media/small-{{ $post->image }}" alt="" class="w-full rounded-md shadow-md">
            <a href="/blog/{{ $post->slug }}" class="hover:text-red-500 block py-2 font-semibold">{{ $post->title }}</a>
        </div>
        @endforeach
    </div>

</x-layout>