<x-layout>
      
<div class="flex my-10">
  <div class="grid grid-cols-3 gap-10 w-9/12">
    @foreach ($gallery_categories as $gallery_category)
      <div>
        <a href="/gallery/albums/{{$gallery_category->id}}">{{ $gallery_category->name }}</a>
        <a href="/gallery/albums/{{$gallery_category->id}}"><img class="" src="{{ URL::asset('images/site/' . $gallery_category->image) }}"></a>
      </div>
      @endforeach        
  </div>       

  <!-- Gallery Sidebar -->

  <div class="w-3/12">         
           @if (Auth::user() && Auth::user()->has_user_role('Admin'))
           <div class="my-5 text-center text-sm">
             <a class="border rounded-md p-1 bg-green-400" href="/gallery/create" role="button">Upload Image</a>
            </div>
           @endif
           
           <div class="my-5">					 
              <p class="text-center"><b>Total Gallery Images</b></p>
              <p class="text-center"><b>{!! $image_count !!}</b></p>
           </div> 
					 
           <div>
              <p class="text-center font-semibold my-5">Popular Tags</p>
          </div>   

					<div class="">				
						@foreach ($popular_tags as $tag)
						  <a class="border rounded-md p-1 inline-block mr-4 my-2 text-sm hover:text-red-500" href="/gallery/search/tags/{{ $tag->name }}" role="button">{{ $tag->name }}</a>
						@endforeach
					</div>
            
           <div>
              <p class="center-block"><b>Recent Images</b></p>
              @foreach ($recent_images as $recent_image)

              <div>
                <p>
                  <a href="/gallery/{!! $recent_image->id !!}"><img src="{{ URL::asset(strtolower($gallery_path . $recent_image->galleryAlbums->galleryCategories->name . '/' . $recent_image->galleryAlbums->name . '/' 
                                 ) . 'thumb-' . $recent_image->image) }}" class="img-responsive img-thumbnail center-block"></a></div></p>
              @endforeach
              <div><hr></div>
           </div>   
            
        </div>     

       </div>
          <div class="container">
           {!! $gallery_categories->links() !!} 
          </div>     
      
      </div>
</div>

</x-layout>