<x-admin>

<div class="mb-5 text-center w-4/5 mx-auto">
    <h1 class="text-xl font-bold">Gallery Categories</h1>
    <p class="text-sm text-gray-500">Manage the gallery categories including the associated albums here.  If a category has 
        albums it cannot be deleted, if an album has images it cannot be deleted.  When a button show locked you cannot delete 
        the item until it is empty.
    </p>
</div>

<!-- Create new category -->

<div>
    <p class="text-center font-bold">Create New Category</p>
    <div class="">
        <form method="POST" action="/admin/gallery-categories" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="text-center text-red-500">
                {{ $errors->has('new_category_name') ? 'A category name is required' : '' }}
            </div>
            <div class="text-center space-x-6 mt-2">
                <input class="h-8 border rounded-md" type="text" id="new_category_name" name="new_category_name"  value="{{ old('new_category_name') }}" placeholder="Enter a category name...">
                <button type="submit" class="border rounded-md py-1 px-2 bg-green-300 text-sm">Create Category</button> 
            </div>
        </form>
    </div>
</div>

<!-- Display Table -->

<div class="my-10 text-center">
    <table class="w-4/5 mx-auto">

        <thead class="">
            <tr class="bg-gray-50">
                <th class="border p-2">ID</th>
                <th class="border">Category</th>
                <th class="border" class="text-center">Albums</th>
            </tr>
        </thead>

        <tbody>

        <div class="text-red-500">{{ $errors->has('category_name') ? 'You have removed a category name below, the name cannot be blank.  I have put the old name back in' : '' }}</div>
            @foreach($categories as $category)
            <tr>
                <td class="border">{{ $category->id }}</td>
                <td class="border-t border-b flex flex-col justify-center items-center">
                    <!-- Manage Categories / Display field with name and button options -->
                    <form method="POST" action="/admin/gallery-categories/{{ $category->id }}" onsubmit="return confirm('Do you really want to change this category name?');">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="flex justify-evenly items-center space-x-2">
                            <input type="text" class="border border-indigo-400 h-8 my-2" name="category_name" value="{{ $category->name }}">
                            <div>
                                <button class="border rounded-md py-1 px-2 bg-indigo-300 text-xs" type="submit">Rename</button>
                            </div>
                    </form>
                                <!-- Add option to delete category if empty -->
                                <form action="/admin/gallery-categories/{{ $category->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this category?');">
                                    {{ csrf_field() }}
                                    {{ method_field ('DELETE') }} 	
                                    
                                    @if ( count($category->galleryalbums) > 0)                        
                                    <button type="submit" class="border rounded-md py-1 px-2 bg-gray-200 text-gray-500 text-xs inline-block" disabled>Locked</button>
                                    @else
                                    <button type="submit" class="border rounded-md py-1 px-2 bg-yellow-300 text-xs inline-block">Delete</button>
                                    @endif
                                </form>
                            </div>
                        </div>

                    <!-- Add album to the chosen category -->
                    <form method="POST" action="/admin/gallery-albums">
                        {{ csrf_field() }}
                        <div class="flex justify-evenly items-center space-x-4">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="text" class="border border-indigo-400 h-8 my-2" name="album_name">
                            <div class="">
                            <button class="border rounded-md py-1 px-2 bg-green-300 text-xs" type="submit">Add Album</button>
                            </div>
                        </div>
                    </form>
                </td>

                <!-- Manage the albums -->
                <td class="border">
                    <!-- Rename Albums -->
                    @foreach ( $category->galleryalbums as $album)
                    <form method="POST" action="/admin/gallery-albums/{{ $album->id }}" onsubmit="return confirm('Do you really want to change this album name?');">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="flex justify-center items-center space-x-2">
                            <input type="text" class="border border-indigo-400 h-8 my-2" name="album_name" value="{{ $album->name }}">
                            <div class="i">
                            <button class="border rounded-md py-1 px-2 bg-indigo-300 text-xs inline-block" type="submit">Rename</button>
                        </div>
                    </form>
                    <form action="/admin/gallery-albums/{{ $album->id }}" method="POST" onsubmit="return confirm('Do you really want to delete this Album?');">
                        {{ csrf_field() }}
                        {{ method_field ('DELETE') }} 

                        @if ( count($album->galleryimages) > 0)                        
                        <button type="submit" class="border rounded-md py-1 px-2 bg-gray-200 text-gray-500 text-xs inline-block" disabled>Locked</button>
                        @else
                        <button type="submit" class="border rounded-md py-1 px-2 bg-red-300 text-xs inline-block">Delete</button>
                        @endif
                    </form>
                        </div>


                        @endforeach
                    @endforeach

                </td>
            </tr>
        
        </tbody>
    </table>		
</div>

</x-admin>