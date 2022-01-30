<x-layout>

    <!-- Uses the PagesController -->
    <!-- Header and random quote passed from Quotes::class -->
    <div>
        <img src="/images/site/Logo.webp" class="mx-auto">
        <div class="w-3/4 mx-auto py-4">
            <p class="text-sm text-center">This website is dedicated to learning more about the Holocaust. There are so many elements to what happened between 1933 and 1945 and I believe it is important to discuss them all. Shocking at times, often harrowing. Millions died at the hands of the Nazis, only by discussing and learning more about the Holocaust can we ensure future generations never forget and those that lost their lives are never forgotten.</p>
        </div>
        <div class="flex justify-center py-2 gap-4">
            <a href="/important"><button class="border rounded-md text-red-800 uppercase py-2 px-2 text-xs hover:text-red-400">Important</button></a>
            <a href="/about"><button class="border rounded-md text-gray-500 uppercase py-2 px-2 text-xs hover:text-red-400">About</button></a>
        </div>
    </div>

    <!-- Display most recent blog posts -->
    <div class="border-b my-5 text-sm font-bold text-red-800">
        <p>Recent Blog Posts</p>
    </div>

    <div class="flex flex-col md:flex-row justify-between gap-10">
        <!-- get 3 most recent posts BlogPosts::class -->
        @foreach($posts as $post)
            <div class="w-full">
                <img src="/images/media/small-{{ $post->image }}" alt="" class="w-full shadow-md shadow-md">
                <a href="/blog/{{ $post->slug }}" class="hover:text-red-800 block py-2 text-sm font-semibold text-center">{{ $post->title }}</a>
            </div>
        @endforeach
    </div>

    <!-- Display most recent blog posts -->
    <div class="py-10 md:w-1/2 mx-auto">
        <p class="border-b text-sm font-bold text-red-800">Recent Blog Posts</p>
        @foreach($posts as $post)
            <div class="flex justify-between items-center w-full space-y-2">
                <?php 
                    $words = str_word_count($post->body);
                    $time = ceil( $words / 250);
                ?>
                <a class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</a>
                <a href="/blog/{{ $post->slug }}" class="hover:text-red-800 block py-2 text-sm font-semibold">{{ $post->title }}</a>
                <a class="text-sm text-gray-400"><?= $time ?> min read</a>
            </div>
        @endforeach
    </div>


</x-layout>