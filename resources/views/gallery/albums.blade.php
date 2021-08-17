<x-layout>

  <div class="flex gap-10">
      <div class="w-9/12">
        <div class="col-md-9 no-padding">
         @foreach ($gallery_albums as $gallery_album)
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading"><a href="/gallery/images/{{$gallery_album->id}}">{{ $gallery_album->name }}</a></div>
              <div class="panel-body">
              </div>
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