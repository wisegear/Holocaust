<x-layout>

<div class="">	
    <div class="container">
      
	<div id="gallery-header">
				
        <h3 class="text-center text-lg font-bold">{{$gallery_image->title}}</h3>
				
				@if (Auth::user() && Auth::user()->has_user_role('Admin'))
						<form action="/gallery/{{ $gallery_image->id }}" method="POST" class="flex justify-center gap-4 my-5"onsubmit="return confirm('Do you really want to delete this Image?');">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button role="submit" class="text-xs border rounded-md p-1 bg-red-300">Delete</button>
						<a class="text-xs border rounded-md p-1 bg-yellow-300" href="/gallery/{!! $gallery_image->id !!}/edit" role="button">Edit</a>
						</form>
				@endif	
				
      </div>
      
      <div class="w-4/5 mx-auto">
				
				<div>
					<img src="{{ $gallery_path . $image_path . $gallery_image->image }}" class="rounded-md mx-auto">
				</div>
		
					<div class="flex flex-col my-10">
						<div>
							<h3 class="font-bold border-b mb-2">Description</h3>
							<p>{{ $gallery_image->description }}</p>
						</div>
						<div class="flex justify-center gap-5 my-5">
							<p>Location: {{$gallery_image->location}}</p>
							<p>Taken: {{$gallery_image->taken}}</p>
							<p>Uploaded By: <a href="/profile/{{$gallery_image->galleryUser->name}}" class="text-red-500">{{$gallery_image->galleryUser->name}}</a></p>
						</div>
						<div class="flex gap-5 my-5 justify-center">
							@foreach ($gallery_image->galleryTags as $tag)
								<a href="/gallery/search/tags/{{ $tag->name }}" class="border rounded-md py-1 px-2 text-xs bg-indigo-100 font-semibold"> {{ $tag->name }} </a>
							@endforeach
						</div>
						<div class="mx-auto">
							<a href="{{ $gallery_path . $image_path . $gallery_image->image }}" type="button" target="_blank" class="border rounded-md py-1 px-2 text-xs bg-yellow-100 font-semibold">View Original Image</a>
						</div>
					</div>
				
  			</div>  <!-- Close image info block -->
			
				<div class=col-md-12>
					
					
				<!-- Display existing comments on the post -->

				<div class="border-b pb-2">
					<p class="font-semibold">Comments</p> 
				</div>

				
				<div class="my-5">
					@foreach( $gallery_image->comments->sortByDesc('created_at') as $comment)
					<div class="flex space-x-5 text-sm">
						<a href="/profile/{{ $comment->users->name }}" class="text-red-500">{{ $comment->users->name }}</a>
							<a>{{ $comment->created_at->diffForHumans() }}</a>
							@can ('Admin')
								<a class="border rounded-md bg-red-300 px-2">
						    		<form action="/comments/{{ $comment->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this Comment?');">
						    		{{ csrf_field() }}
						    		{{ method_field ('DELETE') }} 
						    		<button type="submit" class="">Del</button>
						    		</form>
								@endcan
								</a>
					</div>
					<div class="mt-3 mb-5 text-sm">
							<p class="">{{ $comment->body }}</p>
					</div>
					@endforeach
				</div>


			@if (Auth::check() && Auth::user()->can('Member'))
			<div class="md:w-1/2 mx-auto my-10">
				<p class="font-semibold text-center">Comment on this post</p>
			  	<form method="POST" action="/gallery-comments/{{ $gallery_image->id }}" enctype="multipart/form-data">
			  	{{ csrf_field() }}      
			  	{{ method_field('PUT') }}    
		            <div class="form-group">
		            	<div class="mt-2" style="color: red;">{{ $errors->has('comment') ? 'At least some text is required' : '' }}</div>
	                   <textarea class="w-full rounded-md" name="comment" id="comment" placeholder="Reply here...">{{ old('text') }}</textarea>
	            	</div>
	   
		            <div class="text-center"><button type="submit" class="border rounded-md py-1 px-2 text-sm bg-green-400">Add Comment</button></div>
        		</form>
			</div>
			@else
				<div>
					<p class="font-semibold text-red-500 text-center mt-10">You must log in if you want to comment on this article</p>
				</div>
			@endif

				<!-- End display comments section -->
				

			
		</div>  <!-- Close container -->
		
	</div> <!--- Close row -->

</x-layout>