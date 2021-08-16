<x-layout>

  <div class="row-fluid">
    
    <div class="container">
      <div id="gallery-header">
        <h3>Gallery Index..</h3>
        <div><hr></div>
      </div>
    </div>
    
      <div class="container">
        <div class="col-md-9 no-padding">
          @foreach ($found_images as $found_image)
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading"><a href="/gallery/{!! $found_image->id !!}}">{{ $found_image->title }}</a></div>
              <div class="panel-body">
							<div><p><a href="/gallery/{!! $found_image->id !!}"><img src="{{ URL::asset(strtolower($gallery_path . $found_image->galleryAlbums->galleryCategories->name . '/' . $found_image->galleryAlbums->name . '/' 
                                 ) . 'thumb-' . $found_image->image) }}" class="img-responsive img-thumbnail center-block"></a></div></p>
              </div>
            </div>
           </div>
          @endforeach        
        </div>
         
         <div class="col-md-3">
           <h4>Gallery Information</h4>
           
           <div><hr></div>
           
           @if (Auth::user() && Auth::user()->has_user_role('Admin'))
           <div><a class="btn btn-default center-block" href="/gallery/create" role="button">Upload Image</a></div>
           <div><hr></div>
           @endif
          	
					 <div>						 
              <p class="text-center"><b>Total Gallery Images</b></p>
              <p class="text-center"><b>{!! $image_count !!}</b></p>
              <div><hr></div>
           </div> 
					 
           <div>
              <p class="text-center"><b>Popular Tags</b></p>
					<div id="tags-list">
						
						@foreach ($popular_tags as $tag)
							
						<a id="tags-boxes" class="btn btn-outlined btn-default btn-xs" href="/gallery/search/tags/{{ $tag->name }}" role="button">{{ $tag->name }}</a>
						
						@endforeach
						<div><hr></div>
					</div>
           </div> 
            
           <div>
              <p class="text-center"><b>Recent Images</b></p>
              @foreach ($recent_images as $recent_image)

              <div><p><a href="/gallery/{!! $recent_image->id !!}"><img src="{{ URL::asset(strtolower($gallery_path . $recent_image->galleryAlbums->galleryCategories->name . '/' . $recent_image->galleryAlbums->name . '/' 
                                 ) . 'thumb-' . $recent_image->image) }}" class="img-responsive img-thumbnail center-block"></a></div></p>
              @endforeach
              <div><hr></div>
           </div>   
            
        </div>     

       </div>
          <div class="container">

          </div>     
      
      </div>
  </div>


</x-layout>