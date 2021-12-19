<x-layout>

  <div class="flex gap-10">
      <div class="w-9/12">
        <div class="border-b mb-5">
          <h2 class="text-lg font-bold">Albums in the <span class="text-red-600 italic">{{$gallery_category->name}}</span> category</h2>
          <p class="text-sm text-gray-500 pb-2">{{$gallery_category->description}}</p>
        </div>
        <div class="grid grid-cols-3 gap-10">
         @foreach ($gallery_albums as $gallery_album)
          <div class="relative">
            @if ($gallery_album->galleryImages->count() > 0)
            <a href="/gallery/album/{{$gallery_album->slug}}">
              <img src="{{ $gallery_path }}/{{ strtolower($gallery_album->GalleryCategories->name)}}/{{ strtolower($gallery_album->name) }}/thumb-{{$gallery_album->galleryImages->random()->image}}" alt="" class=" rounded-md shadow-md">
                <div class="absolute right-0 top-5">
                  <span class="py-1 px-4 rounded-tl-md rounded-bl-md border-t border-b border-l bg-red-100 text-xs font-bold shadow-md">{{ $gallery_album->name }}</span>
                </div>
            </a>
            @endif
          </div>
         @endforeach 
         </div> 
      </div> 
      <div class="w-3/12">
        <x-gallery-sidebar/>
      </div>    
  </div>

</x-layout>