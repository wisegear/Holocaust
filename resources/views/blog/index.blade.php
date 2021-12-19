<x-layout>

<!-- blog Index -->

<div class="flex flex-col md:flex-row gap-20">
    <div class=" md:w-9/12">
		<!-- Get posts and loop through -->
        @foreach ($posts as $post)
            <img src="/images/media/medium-{{ $post->image }}" alt="" class="rounded-md mb-4">
            <h2 class="text-2xl font-bold hover:text-red-500 mb-2"><a href="/blog/{{$post->slug}}">{{ $post->title }}</a></h2>
            <div class="text-sm mb-4 flex space-x-6">
                <p>Posted by <a href="/profile/{{ $post->users->name_slug }}" class="text-red-500">{{ $post->users->name }}</a></p>
                <p>around {{ $post->created_at->diffForHumans() }}</p>
                <p>in <a href="/blog/?category={{$post->blogcategories->name }}" class="text-red-500">{{ $post->blogcategories->name }}</a></p>
            </div>
            <div class="mb-6">{!! Str::limit($post->body, 200) !!}</div>
            <div class="my-4">
                @foreach ( $post->blogTags as $tag)
                    <a href="/blog?tag={{ $tag->name }}" class="border rounded-md py-1 px-2 text-sm bg-blue-50 hover:bg-blue-100"> {{ $tag->name }}</a>
                @endforeach
            </div>
            <div>
                <ul class="flex space-x-4 justify-end mb-4">
                    <li class="">
                        @can ('Admin')
                                <form action="/blog/{{ $post->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this Post?');">
                                {{ csrf_field() }}
                                {{ method_field ('DELETE') }} 
                                <input class="border rounded-md py-1 px-2 text-xs bg-red-50 hover:bg-red-100" role="button" type="submit" value="Delete">
                                </form>
                        </li>
                        <li class="border rounded-md py-1 px-2 text-xs font-semibold bg-yellow-50 hover:bg-yellow-100"><a class="" href="/blog/{{ $post->id }}/edit" role="button">Edit</a></li>
                        @endcan
                </ul>
            </div>
        @endforeach
		<!-- End post loop -->

		<!-- Display pagination -->
		<div class="mt-10">
			{{ $posts->links() }}
		</div>
    </div>

	<!-- Display sidebar, using a component-->
    <div class="flex flex-col md:w-3/12">
        <x-blog-sidebar/>
	</div>

</div>

</x-layout>
