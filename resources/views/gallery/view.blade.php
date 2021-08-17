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
					
					
				<!-- was comment section -->
				

			
		</div>  <!-- Close container -->
		
	</div> <!--- Close row -->

</x-layout>