<x-layout>

<div class="flex gap-10">
  <div class="w-9/12">
    <div class="border-b mb-5">
      <h2 class="text-lg font-bold">Images in the <span class="text-red-600 italic">{{$album->name}}</span> Album</h2>
      <p class="text-sm text-gray-500 pb-2">{{$album->description}}</p>
    </div>
    <div class="grid grid-cols-3 gap-10">     
    @foreach ($gallery_images as $gallery_image)
      <div class="relative">
        <a href="/gallery/{{$gallery_image->id}}"><img class="min-w-0 rounded-md shadow-" 
        src="/images/gallery/{{ strtolower($gallery_image->GalleryAlbums->GalleryCategories->name) }}/{{ strtolower($gallery_image->GalleryAlbums->name) }}/thumb-{{$gallery_image->image}}">
        <div class="absolute right-0 top-5">
          <span class="py-1 px-4 rounded-tl-md rounded-bl-md border-t border-b border-l bg-red-100 text-xs font-bold shadow-md">{{ $gallery_image->title }}</span>
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
