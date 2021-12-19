<x-layout>

<!-- Main content area -->
      
<div class="flex gap-10">

    <!-- Most recent uploaded images -->
    <div class="w-9/12">
    <div class="border-b mb-5">
      <h2 class="text-lg font-bold">Most recent images added to the gallery</h2>
      <p class="text-sm text-gray-500 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales neque nec blandit dignissim. Donec metus lorem, imperdiet scelerisque viverra in, lacinia dignissim ex. Maecenas nunc nunc, ornare in nibh sed, ultricies ullamcorper turpis. Sed leo</p>
    </div>
      <div class="grid grid-cols-4 gap-5">
        @foreach ($recent_images as $image)
        <div class="relative">
          <a href="/gallery/{{$image->id}}" class="">
            <img src="{{ $gallery_path }}/{{ strtolower($image->GalleryAlbums->GalleryCategories->name) }}/{{ strtolower($image->GalleryAlbums->name) }}/thumb-{{$image->image}}" 
              alt="" class=" rounded-md shadow-md">
              <div class="absolute right-0 top-5">
                <span class="py-1 px-4 rounded-tl-md rounded-bl-md border-t border-b border-l bg-red-100 text-xs font-bold shadow-md">{{ $image->galleryalbums->name }}</span>
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