<x-layout>

<div class="">	
    <div class="container">
      
	<div id="gallery-header">
				
        <h3 class="text-center text-lg font-bold">{{$gallery_image->title}}</h3>
				
				@if (Auth::user() && Auth::user()->has_user_role('Admin'))
						<form action="/gallery/{{ $gallery_image->id }}" method="POST" class="flex justify-center gap-4 my-5">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button role="submit" class="text-xs border rounded-md p-1 bg-red-300">Delete</button>
						<a class="text-xs border rounded-md p-1 bg-yellow-300" href="/gallery/{!! $gallery_image->id !!}/edit" role="button">Edit</a>
						</form>
				@endif	
				
      </div> <!-- Close image block -->
      
      <div class="col-md-12">
				
				<div><img src="{{ URL::asset($gallery_path . $image_path . $gallery_image->image) }}" class="rounded-md"></div>
				
				<div><hr></div>
				
					<div>
						
						<ul>
							<li>Location: {{$gallery_image->location}}</li>
							<li>Taken: {{$gallery_image->taken}}</li>
							<li>Description: {{ $gallery_image->description }}</li>
							<li>Uploaded By: {{$gallery_image->galleryUser->username}}</li>
							@foreach ($gallery_image->galleryTags as $tag)
								<li><i class="fa fa-tags"></i><a href="/gallery/search/tags/{{ $tag->name }}"> {{ $tag->name }} </a></li>
							@endforeach
						</ul>
						
						<a href="{{ URL::asset($gallery_path . $image_path . $gallery_image->image) }}" target="_blank">View Original Image</a>
					
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
	                   <textarea class="w-full" name="comment" id="comment" placeholder="Reply here...">{{ old('text') }}</textarea>
	            	</div>
	   
		            <div class="text-center"><button type="submit" class="border rounded-md p-2 text-sm bg-green-400">Add Comment</button></div>
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