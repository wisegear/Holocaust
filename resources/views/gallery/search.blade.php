<x-layout>

  <div class="flex gap-10">
       
    <div class="w-9/12">
    <div class="border-b mb-5">
      <h2 class="text-lg font-bold">Search results for the tag <span class="text-red-800">{{ $searchTag }}</span></h2>
      <p class="text-sm text-gray-500 pb-2">Using the tag you have selected I have found the following images.</p>
    </div>
      <div class="grid grid-cols-4 gap-5">
        @foreach ($found_images as $found_image)
        <div class="relative shadow-md">
          <a href="/gallery/image/{{$found_image->slug}}" class="">
            <img src="{{ $gallery_path }}/{{ strtolower($found_image->GalleryAlbums->GalleryCategories->name) }}/{{ strtolower($found_image->GalleryAlbums->name) }}/thumb-{{$found_image->image}}" 
              alt="" class="shadow-md">
              <div class="absolute right-0 top-5">
                <span class="py-1 px-4 border-t border-b border-l bg-gray-100 text-xs shadow-md">{{ $found_image->galleryalbums->name }}</span>
              </div>
              <div class="text-xs py-1 text-center bg-gray-50 border text-gray-600">
                {{$found_image->title}}
              </div>
            </a>
        </div>
        @endforeach        
      </div>
    </div>
      
    <div class="w-3/12">
      <x-gallery-sidebar/>
    </div>   

  </div>

</x-layout>