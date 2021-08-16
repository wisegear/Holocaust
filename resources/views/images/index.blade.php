<x-layout>

<div class="">

  <div class="">
    <div class="">
        <form method="POST" action="/media" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="">
          <label>Select new image:</label>
          <input type="file" name="add-media" accept="image/*" onchange="loadFile(event)">
            <script>
            var loadFile = function(event) {
            var output = document.getElementById('media');
            output.src = URL.createObjectURL(event.target.files[0]);
            };
            </script> 
            <img class="img-responsive img-thumbnail" id="media">

            <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 20px; margin-top: 10px;">Insert Image</button> 
        </form>
    <div>
        <hr>

<div class="grid grid-cols-5 gap-10">
        @foreach ($all_media as $item)
          <div class="">
              <img src="/images/media/small-{{ $item->name }}" class="w-full max-h-60 border border-gray-900">
              <input class="w-full text-center mt-1 text-xs text-gray-600" type="text" name="image" id="imagename" value="{{ $item->name }}">
          </div>
         
        @endforeach
    </div>
  </div>
</div>

</x-layout>