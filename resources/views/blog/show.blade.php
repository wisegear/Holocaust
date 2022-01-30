<x-layout>

<div class="md:w-10/12 mx-auto">

	<!-- Display Single Post-->
    <div class="">
		<h2 class="text-2xl font-bold text-center"><a>{{ $post->title }}</a></h2>
		<p class="text-sm mb-2 text-center">{{ $post->created_at->diffForHumans() }}</p>
		<div class="mb-10 mt-4 w-4/5 mx-auto text-center text-gray-500 text-sm">{!! $post->excerpt !!}</div>
		<img src="/images/media/large-{{ $post->image }}" alt="" class="shadow-md mb-10 mx-auto">
		<div class="mb-10 prose max-w-screen-lg text-sm">{!! $post->body !!}</div>
    </div>

	<!-- Display existing comments on the post -->
	<div class="border-b pb-2">
		<p class="font-semibold">Comments</p> 
	</div>

	<div class="my-5">
		<!-- Get comments and sort by latest date -->
		@foreach( $post->comments->sortByDesc('created_at') as $comment)
		<div class="flex space-x-5 text-sm">
			<!-- Name of the user commenting -->
			<a href="/profile/{{ $comment->users->name_slug }}" class="text-red-500">{{ $comment->users->name }}</a>
				<a>{{ $comment->created_at->diffForHumans() }}</a>
				<!-- Only admin can edit/delete -->
				@can ('Admin')
					<a class="border rounded-md bg-red-300 px-2">
						<form action="/comments/{{ $comment->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this Comment?');">
						{{ csrf_field() }}
						{{ method_field ('DELETE') }} 
						<button type="submit" class="text-xs">Delete</button>
						</form>
					@endcan
					</a>
		</div>
		<!-- Display the comment text-->
		<div class="mt-3 mb-5 text-sm">
				<p class="">{{ $comment->body }}</p>
		</div>
		@endforeach
	</div>

	<!-- Must be a member to see comment box and comment -->
	@if (Auth::check() && Auth::user()->can('Member'))
	<div class="md:w-3/4 mx-auto my-10">
		<p class="text-sm text-gray-500">Comment on this post</p>
		<form method="POST" action="/comments/{{ $post->id }}" enctype="multipart/form-data">
		{{ csrf_field() }}      
		{{ method_field('PUT') }}    
			<div class="form-group">
				<div class="mt-2" style="color: red;">{{ $errors->has('comment') ? 'At least some text is required' : '' }}</div>
				<textarea class="w-full bg-gray-50 border-gray-200 text-sm" name="comment" id="comment" placeholder="Reply here...">{{ old('text') }}</textarea>
			</div>
			<div class="text-center"><button type="submit" class="border rounded-md p-2 text-xs hover:border-green-500 hover:bg-green-50 mt-2">Add Reply</button></div>
		</form>
	</div>
	@else <!-- If not a member show login comment -->
		<div>
			<p class="font-semibold text-red-500 text-center mt-10">You must <a href="/login" class="text-gray-700">log in</a> or <a href="/register" class="text-gray-700">register</a> if you want to comment on this article</p>
		</div>
	@endif

	</div>	
	<!-- End comments section -->

</div>
</x-layout>