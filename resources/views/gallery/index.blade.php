<x-layout>

<!-- Main content area -->
      
<div class="flex gap-10">

    <!-- Most recent uploaded images -->
    <div class="w-9/12">
      <h2 class="text-lg font-bold mb-2">Recently added images</h2>
      <div class="grid grid-cols-3 gap-10">
        @foreach ($recent_images as $image)
          <img src="{{ $gallery_path }}/{{ $image->GalleryAlbums->GalleryCategories->name }}/{{ $image->GalleryAlbums->name }}/thumb-{{$image->image}}" alt="" class=" rounded-md shadow-md">
        @endforeach
      </div>
    </div>    
    
    <div class="w-3/12">
      <x-gallery-sidebar/>
    </div>

</div>




</x-layout>