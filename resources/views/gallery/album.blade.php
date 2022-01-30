<x-layout>

<div class="flex gap-10">
  <div class="w-9/12">
    <div class="border-b mb-5">
      <h2 class="text-lg font-bold">Images in the <span class="text-red-600 italic">{{$album->name}}</span> Album</h2>
      <p class="text-sm text-gray-500 pb-2">{{$album->description}}</p>
    </div>
    <div class="grid grid-cols-4 gap-10">     
    @foreach ($gallery_images as $gallery_image)
      <div class="">
        <a href="/gallery/image/{{$gallery_image->slug}}"><img class="shadow-md" 
        src="/images/gallery/{{ strtolower($gallery_image->GalleryAlbums->GalleryCategories->name) }}/{{ strtolower($gallery_image->GalleryAlbums->name) }}/thumb-{{$gallery_image->image}}">
        </a>
            <div class="text-xs py-1 text-center bg-gray-50 border text-gray-600">
              {{$gallery_image->title}}
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
