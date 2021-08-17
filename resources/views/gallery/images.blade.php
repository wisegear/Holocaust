<x-layout>
<div class="flex gap-10">

  <div class="w-9/12 grid grid-cols-3 gap-10">      
    @foreach ($gallery_images as $gallery_image)
      <div>
          <a href="/gallery/{{$gallery_image->id}}"><img class="min-w-0 rounded-md shadow-" 
          src="/images/gallery/{{ $gallery_image->GalleryAlbums->GalleryCategories->name }}/{{ $gallery_image->GalleryAlbums->name }}/thumb-{{$gallery_image->image}}"></a>
          <a href="/gallery/{{$gallery_image->id}}" class="block my-2">{{$gallery_image->title}}</a>
        </div>
    @endforeach        
  </div>

  <div class="w-3/12">
    <x-gallery-sidebar/>
  </div>  
      

</div>


</x-layout>
