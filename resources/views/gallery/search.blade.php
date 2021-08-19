<x-layout>

  <div class="flex">
       
    <div class="w-9/12">
      <div class="grid grid-cols-3 gap-5">
        @foreach ($found_images as $found_image)
        <div class="">
          <div class="">
            <a href="/gallery/{!! $found_image->id !!}}">{{ $found_image->title }}</a>
          </div>
          <div>
            <p>
              <a href="/gallery/{!! $found_image->id !!}"><img src="{{ URL::asset(strtolower($gallery_path . $found_image->galleryAlbums->galleryCategories->name . '/' . $found_image->galleryAlbums->name . '/' 
                                ) . 'thumb-' . $found_image->image) }}" class="rounded-md"></a>
            </p>
          </div>
        </div>
        @endforeach        
      </div>
    </div>
      
    <div class="w-3/12">
      <x-gallery-sidebar/>
    </div>   

  </div>

</x-layout>