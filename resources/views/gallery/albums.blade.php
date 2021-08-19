<x-layout>

  <div class="flex gap-10">
      <div class="w-9/12">
        <div class="grid grid-cols-3 gap-10">
         @foreach ($gallery_albums as $gallery_album)
            <div class="">
              <a href="/gallery/images/{{$gallery_album->id}}">{{ $gallery_album->name }}</a>
                <img src="{{ $gallery_path }}/{{ strtolower($gallery_album->GalleryCategories->name) }}/{{ strtolower($gallery_album->name) }}/thumb-{{$gallery_album->galleryImages->random()->image}}" alt="" class=" rounded-md shadow-md">
            </div>
          @endforeach        
        </div>
      </div> 
      <div class="w-3/12">
        <x-gallery-sidebar/>
      </div>    
  </div>

</x-layout>