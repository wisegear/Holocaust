<x-layout>

<!-- Main content area -->
      
<div class="flex gap-10">

    <!-- Most recent uploaded images -->
    <div class="w-9/12">
    <div class="border-b mb-5">
      <h2 class="text-lg font-bold">Most recent images added to the gallery</h2>
      <p class="text-sm text-gray-500 pb-2">The most recent images added to the gallery are displayed below.  Use the categories list on the right had menu to find more specific images or the search box.  Popular tags have also been added to quickly search for image groups that are popular.</p>
    </div>
      <div class="grid grid-cols-4 gap-5">
        @foreach ($recent_images as $image)
        <div class="relative shadow-md">
          <a href="/gallery/image/{{$image->slug}}" class="">
            <img src="{{ $gallery_path }}/{{ strtolower($image->GalleryAlbums->GalleryCategories->name) }}/{{ strtolower($image->GalleryAlbums->name) }}/thumb-{{$image->image}}" 
              alt="" class="shadow-md">
              <div class="absolute right-0 top-5">
                <span class="py-1 px-4 border-t border-b border-l bg-gray-100 text-xs shadow-md">{{ $image->galleryalbums->name }}</span>
              </div>
              <div class="text-xs py-1 text-center bg-gray-50 border text-gray-600">
                {{$image->title}}
              </div>
            </a>
        </div>
        @endforeach
      </div>
      <div class="w-4/5 mx-auto mt-10">
        {{ $recent_images->links() }}
      </div>
    </div>    
    
    <div class="w-3/12">
      <x-gallery-sidebar/>
    </div>

</div>

</x-layout>