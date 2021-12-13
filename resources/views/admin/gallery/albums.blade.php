<x-admin>

<div class="mb-5 text-center w-4/5 mx-auto">
    <h1 class="text-xl font-bold">Gallery Albums in <span class="text-red-500">{{$category->name}}</span></h1>
    <p class="text-sm text-gray-500">Manage the gallery categories including the associated albums here.  If a category has 
        albums it cannot be deleted, if an album has images it cannot be deleted.  When a button show locked you cannot delete 
        the item until it is empty.
    </p>
</div>

<!-- Create new category -->

<div>
    <p class="text-center font-bold">Create New Album</p>
    <div class="">
        <form method="POST" action="/admin/gallery-albums" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="text-center text-red-500">
                {{ $errors->has('new_album_name') ? 'An Album name is required' : '' }}
            </div>
            <div class="text-center space-x-6 mt-2">
                <input class="h-8 border rounded-md" type="text" id="new_album_name" name="new_album_name"  value="{{ old('new_album_name') }}" placeholder="Enter an album name...">
                <input type="hidden" name="category" value="{{$category->id}}">
                <button type="submit" class="border rounded-md py-1 px-2 bg-green-300 text-sm">Create Album</button> 
            </div>
        </form>
    </div>
</div>


<!-- List Categories and albums for editing -->

    <div class="grid grid-cols-3 gap-4 py-10">
        @foreach($albums as $album)
            <div>   
                <!-- form to manage category name and editing it -->
                <form method="POST" action="/admin/gallery-albums/{{ $album->id }}" onsubmit="return confirm('Do you really want to change this album name?');">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    <input type="text" class="border border-indigo-400 h-8 my-2" name="album_name" value="{{ $album->name }}">
                    <textarea class="border border-indigo-400 h-8 my-2 w-full h-20 text-sm" name="album_description">{{ $album->description }}</textarea>
                    <button class="border rounded-md py-1 px-2 bg-indigo-300 text-xs mb-2" type="submit">Update</button>
                </form>
                <!-- form to delete album if empty -->
                <form action="/admin/gallery-albums/{{ $album->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this album?');">
                {{ csrf_field() }}
                {{ method_field ('DELETE') }} 
                    @if ( count($album->galleryimages) > 0)                        
                         <button type="submit" class="border rounded-md py-1 px-2 bg-gray-200 text-gray-500 text-xs" disabled>Locked ({{$album->galleryimages->count()}})</button>
                    @else
                        <button type="submit" class="border rounded-md py-1 px-2 bg-yellow-300 text-xs">Delete</button>
                    @endif
                </form>
            </div>
        @endforeach
    </div>

</x-admin>