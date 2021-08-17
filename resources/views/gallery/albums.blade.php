<x-layout>

  <div class="flex">
      <div class="w-9/12">
        <div class="col-md-9 no-padding">
         @foreach ($gallery_albums as $gallery_album)
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading"><a href="/gallery/images/{{$gallery_album->id}}">{{ $gallery_album->name }}</a></div>
              <div class="panel-body">
                <a href="/gallery/images/{{$gallery_album->id}}"><img class="center-block img-responsive" src="http://placehold.it/125x125"></a>
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