<x-layout>

  <div class="row-fluid">
		
    <div class="container">
      
			<div id="gallery-header">
				
        <h3>{{$gallery_image->title}}</h3>
				
				@if (Auth::user() && Auth::user()->has_user_role('Admin'))
						<form action="/gallery/{{ $gallery_image->id }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button role="submit">Delete</button>
						<a class="btn btn-outlined btn-warning btn-xs" href="/gallery/{!! $gallery_image->id !!}/edit" role="button">Edit</a>
						</form>
				@endif		
				
        <div><hr></div>
				
      </div> <!-- Close image block -->
      
      <div class="col-md-12">
				
				<div><img src="{{ URL::asset($gallery_path . $image_path . $gallery_image->image) }}" class="img-responsive img-thumbnail center-block"></div>
				
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
					
					<div><hr></div>
					
				<!-- was comment section -->
				

			
		</div>  <!-- Close container -->
		
	</div> <!--- Close row -->

</x-layout>