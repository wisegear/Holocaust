<x-layout>

    <div class="">
        <h1 class="text-center text-lg font-bold pb-2">Holocaust History Site </h1>
        <p class="mx-auto text-center w-1/2 text-sm py-2">This site is dedicated to the history of the Holocaust.  I am currently creating this site as at August 2021.  My previous site built
         nearly 20 years ago using only HTML needed a new home and this is it.  Stay tuned, lots in progress.
        </p>
        <div class="flex justify-center py-2 gap-4">
            <a href="/important"><button class="border rounded-md text-red-500 uppercase py-1 px-2 text-xs hover:text-red-800">Important</button></a>
            <a href="/about"><button class="border rounded-md text-red-500 uppercase py-1 px-2 text-xs hover:text-red-800">About</button></a>
        </div>
    </div>

    <div class="border-b my-5 text-sm font-bold text-red-500">
        <p>Recent Blog Posts</p>
    </div>

    <div class="flex justify-between gap-10">
        @foreach($posts as $post)
        <div class="w-full">
            <img src="/images/media/small-{{ $post->image }}" alt="" class="w-full rounded-md shadow-md">
            <a href="/blog/{{ $post->slug }}" class="hover:text-red-500 block py-2 font-semibold">{{ $post->title }}</a>
        </div>
        @endforeach
    </div>

    <article class="prose max-w-screen-xl mt-20">
        <h1 class="">Update</h1>
        <p class="">This is a new website, a rebuild of my old Holocaust History website built neatly 20 years ago.  
            Trying to go high tech by learning new web software and programming so it may take a while to get everything built.</p>
        <p class="">The real challenge will be moving everything from an old html site of thousands of pages to this new database driven one :)</p>
        <p>At this stage I have completed the sections that are going to require the most amount of manual work.  Uploading images, entering all the timeline events and so on.
            For now I am going to focus on building out the site design, tidy the code and start inputting.  The site is really messy as I have not been worrying about layout until now.</p>
        </p>
        <p>Stay tuned!  Last updated 16th August 2021.</p>
        <div class="flex justify-evenly">
            <ul>
            <h3>Completed so far:</h3>
                <li>User Profiles</li>
                <li>Responsive layouts (yeah, get me!)</li>
                <li>Support System</li>
                <li>Blog</li>
                <li>Quotes Section</li>
                <li>Admin Panel</li>
                <li>Timeline</li>
                <li>Gallery (hard one)</li>
            </ul>
            
            <ul>
            <h3>In progress:</h3>
                <li>Code tidy up and testing</li>
            </ul>
            
            <ul>
            <h3>Not started:</h3>
                <li>Articles Section</li>
                <li>Forum (lol)</li>
            </ul>
        </div>
</article>

</x-layout>