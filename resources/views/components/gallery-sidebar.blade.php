   
          @if (Auth::user() && Auth::user()->has_user_role('Admin'))
           <div class="mb-5 text-center text-sm">
             <a class="border rounded-md p-1 bg-green-400" href="/gallery/create" role="button">Upload Image</a>
            </div>
          @endif
           <!-- -->
          <div class="p-2 border rounded-md bg-gray-50">					 
              <p class="text-center font-bold">Total Gallery Images</p>
              <p class="text-center text-red-500"><b>{{ $image_count }}</b></p>
          </div> 

          <div class="my-5">
            <h2 class="text-lg font-bold">Gallery Categories</h2>	
              <div class="flex flex-col space-y-1 mt-2">
              @foreach ($gallery_categories as $gallery_category)
                  <a href="/gallery/category/{{$gallery_category->slug}}">{{ $gallery_category->name }}</a>
              @endforeach 
            </div>	
          </div>
					<div class="my-5">	
          <h2 class="text-lg font-bold">Popular Tags</h2>			
						@foreach ($popular_tags as $tag)
						  <a class="border rounded-md p-1 inline-block mr-2 my-2 text-sm hover:text-red-500" href="/gallery/search/tags/{{ $tag->name }}" role="button">{{ $tag->name }}</a>
						@endforeach
					</div>
